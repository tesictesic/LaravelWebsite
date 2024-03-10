<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminInsertUpdateModelRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Mockery\Exception;
use function Laravel\Prompts\select;

class AdminModelResource extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tabela='models';
        $models_with_brands=DB::table('brands')
                 ->join('brands as parent_brand','brands.parent_id','=','parent_brand.id')
                 ->select(
                     'brands.id',
                     'brands.name as model_name',
                     'parent_brand.name as brand_name'

                        )->paginate(8);
        $kolone=['model_name','brand_name'];
        return view('adminPanel.pages.select',['data'=>$models_with_brands,"columns"=>$kolone,"tabela"=>$tabela]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kolone=['model_name','brand_id'];
        $tabela='models';
        $models_with_brands=DB::table('brands')
            ->where('parent_id',null)
            ->select('brands.id','brands.name')
            ->get();
        return view('adminPanel.pages.insert',['columns'=>$kolone,'tabela'=>$tabela,'niz'=>$models_with_brands,"niz2"=>null,"niz3"=>null,"niz4"=>null,"niz5"=>null]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminInsertUpdateModelRequest $request)
    {
        $parent_id=$request->input('brand_id');
        $model_name=$request->input('model_name');
        try{
            Brand::create([
                'name'=>$model_name,
                'parent_id'=>$parent_id
            ]);
            return redirect()->route('models.index');
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
    public function edit($id)
    {
        $kolone=['model_name','brand_id'];
        $tabela='models';
        $models_with_brands=DB::table('brands')
            ->where('parent_id',null)
            ->select('brands.id','brands.name')
            ->get();
        $objekat=DB::table('brands')
            ->join('brands as parent_brand','brands.parent_id','=','parent_brand.id')
            ->select(
                'brands.parent_id as parent',
                'brands.id',
                'brands.name as model_name',

            )->where('brands.id',$id)->first();
        return view("adminPanel.pages.edit",["tabela"=>$tabela,"kolone"=>$kolone,"objekat"=>$objekat,"ddl1"=>$models_with_brands,"ddl2"=>null,"ddl3"=>null,"ddl4"=>null,"ddl5"=>null]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'model_name'=>"required",
            'brand_id'=>[
                'required',
                Rule::exists('brands','id')->whereNull('parent_id')
            ]
        ]);
        $parent_id=$request->input('brand_id');
        $model_name=$request->input('model_name');
        try{
            $objekat=Brand::find($id);
            $objekat->name=$model_name;
            $objekat->parent_id=$parent_id;
            $objekat->save();
            return redirect()->route('models.index');
        }
        catch (\Exception $e){
            dd($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $objekat=Brand::find($id);
        try{
            $objekat->delete();
            return response()->json(['success' => true]);
        }catch (Exception $e){
            return response()->json(['error' => 'cannot be deleted due to referential integrity']);
        }
    }
}
