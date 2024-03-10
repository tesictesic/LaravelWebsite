<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminInsertUpdateUserRequest;
use App\Models\AdminCRUDModel;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Mockery\Exception;

class AdminUserController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tabela="users";
        $tabela_veza=["roles"];
        $tabela_strani_kljucevi=["role_id"];
        $objekat_model=new AdminCRUDModel();
        $zapisi=$objekat_model->select_function($tabela,$tabela_veza,$tabela_strani_kljucevi);
        $kolone=$objekat_model->columns_for_table($tabela);
        return view('adminPanel.pages.select',['data'=>$zapisi,"columns"=>$kolone,"tabela"=>$tabela]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tabela='users';
        $objekat_model=new AdminCRUDModel();
        $kolone=$objekat_model->columns_for_table($tabela);
        $roles_ddl=Role::all();
        return view('adminPanel.pages.insert',['columns'=>$kolone,'tabela'=>$tabela,"niz"=>$roles_ddl,"niz2"=>null,"niz3"=>null,"niz4"=>null,"niz5"=>null]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminInsertUpdateUserRequest $request)
    {
        $first_name=$request->input('first_name');
        $last_name=$request->input('last_name');
        $email=$request->input('email');
        $password=$request->input('password');
        $role_id=$request->input('role_id');
        if($request->has('picture')){
            $picture_name=$request->file('picture')->getClientOriginalName();
            $this->cutImage($request,true);
        }
        else{
            $picture_name='user.png';
        }
        $hesovana_sifra=Hash::make($password);
        try{
            User::create([
                'first_name'=>$first_name,
                'last_name'=>$last_name,
                'email'=>$email,
                'password'=>$hesovana_sifra,
                'picture'=>$picture_name,
                'role_id'=>$role_id
            ]);
            return redirect()->route('users.index');
        }
        catch (\Exception $e){
            dd($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tabela="users";
        $objekat_model=new AdminCRUDModel();
        $kolone=$objekat_model->columns_for_table($tabela);
        $objekat=$objekat_model->select_function($tabela,null,null,$id);
        $roles_ddl=Role::all();
        return view("adminPanel.pages.edit",["tabela"=>$tabela,"kolone"=>$kolone,"objekat"=>$objekat,"ddl1"=>$roles_ddl,"ddl2"=>null,"ddl3"=>null,"ddl4"=>null,"ddl5"=>null]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            "first_name"=>'required|regex:/^[A-Za-z ]+$/',
            "last_name"=>'required|regex:/^[A-Za-z ]+$/',
            'email' => 'required|email:rfc,dns',
            'picture'=>'file|mimes:jpg,bmp,png',
            'role_id'=>'required|exists:roles,id'
        ]);
        $first_name=$request->input('first_name');
        $last_name=$request->input('last_name');
        $email=$request->input('email');
        $role_id=$request->input('role_id');
        $objekat=User::find($id);
        if($request->has('picture')){
            $picture_name=$request->file('picture')->getClientOriginalName();
            $this->cutImage($request,true);
        }
        else{
            $picture_name=$objekat->picture;
        }
        try {

            $objekat->first_name=$first_name;
            $objekat->last_name=$last_name;
            $objekat->email=$email;
            $objekat->picture=$picture_name;
            $objekat->role_id=$role_id;
            if($objekat->role_id==1){
                Session::put('user',$objekat);
            }
            $objekat->save();

            return redirect()->route('users.index');
        }
        catch (Exception $e){
            dd($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $objekat=User::find($id);
        try{
            $objekat->delete();
            return response()->json(['success' => true]);
        }catch (Exception $e){
            return response()->json(['error' => 'cannot be deleted due to referential integrity']);
        }
    }
}
