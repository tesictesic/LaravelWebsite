<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Order;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class OrderController extends BaseController
{
    public function order_index($car_id,$user_id)
    {
        $user_for_id=User::find($user_id);
        $auto_objekat=new Vehicle();
        $rezultat=$auto_objekat->GetCarWithOrWithoutElement($car_id);
    return view('pages.order',["user"=>$user_for_id,"vehicle"=>$rezultat]);
    }
    public function order_store(Request $request)
    {
        $request->validate([
            "location"=>'required'
        ]);
        $vehicle_id=$request->input('vehicle_id');
        $user_id=$request->input('user_id');
        $user_objekat=User::find($user_id);
        $vozilo=DB::table('vehicles')
            ->join('brands', 'vehicles.brand_id', '=', 'brands.id')
            ->join('brands as parent_brands', 'brands.parent_id', '=', 'parent_brands.id')
            ->select(
                'parent_brands.name as marka_naziv',
                'brands.name as model_naziv',
                'vehicles.label'
            )->where('vehicles.id',$vehicle_id)->first();
        $lokacija=$request->input('location');
        $status_id=2;
        try{
            Order::create([
               "location"=>$lokacija,
               "user_id"=>$user_id,
               "vehicle_id"=>$vehicle_id,
               "status_id"=>$status_id
            ]);
            $message = $user_objekat->first_name." ".$user_objekat->last_name." with his email: ".$user_objekat->email." has ordered ".$vozilo->marka_naziv." ".$vozilo->model_naziv." ".$vozilo->label." on: ".now();
            $log_type=4;
            Log::create([
                'value'=>$message,
                'logs_type_id'=>$log_type
            ]);
            return redirect()->back()->with('success',"You have succesfull ordered your car. Check your profile to follow your delivery");
        }catch (Exception $e){
            dd($e->getMessage());
        }

    }
}
