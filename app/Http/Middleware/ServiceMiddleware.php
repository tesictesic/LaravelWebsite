<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class ServiceMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user=Session::get('user');
        if($user!=null){
            $ima_auta=DB::table('users')
                ->join('orders','users.id','=','orders.user_id')
                ->where('user_id',$user->id)
                ->where('status_id','=',1)
                ->get();
            if(count($ima_auta)==0){
                return redirect()->back();
            }
        }
        else{
            return redirect()->back();
        }
        return $next($request);
    }
}
