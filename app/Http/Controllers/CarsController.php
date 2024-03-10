<?php

namespace App\Http\Controllers;

use App\Models\ArchivedSearches;
use App\Models\Brand;
use App\Models\Car_Body;
use App\Models\Fuel;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CarsController extends BaseController
{
    private $data;
    public function getModel($id)
    {
        $brand=Brand::find($id);
        $model=$brand->children;
        return response()->json($model);
    }
    public function index()
    {

        $marka=Brand::whereNull('parent_id')->get();
        $gorivo=Fuel::all();
        $karoserija=Car_Body::all();
        $this->data['marka']=$marka;
        $this->data['goriva']=$gorivo;
        $this->data['karoserije']=$karoserija;
        if(Session::has('user')){
            $user_id=Session::get('user')->id;
            $objekat_searches=new ArchivedSearches();
            $svi=$objekat_searches->getAll($user_id);
            $this->data['bookmars']=$svi;
        }

        return view('pages.cars',$this->data);
    }

    public function getCarWithId($id)
    {
        $sva_auta=new Vehicle();
        $rezultat=$sva_auta->GetCarWithOrWithoutElement($id);
            return view('pages.single-page',['data'=>$rezultat]);
    }
    public function pagination(Request $request)
    {
        $sva_auta=new Vehicle();
        $rezultat=$sva_auta->GetCarWithOrWithoutElement($id=null,$request->all());
        return response()->json($rezultat);
    }
    public function getCarsAndFilterCars(Request $request)
    {
        $sva_auta=new Vehicle();
        $rezultat=$sva_auta->GetCarWithOrWithoutElement($id=null,$request->all());
        return response()->json($rezultat);
    }
}
