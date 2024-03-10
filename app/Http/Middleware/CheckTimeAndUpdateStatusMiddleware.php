<?php

namespace App\Http\Middleware;

use App\Models\Order;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Symfony\Component\HttpFoundation\Response;

class CheckTimeAndUpdateStatusMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $orders=Order::where('status_id',2)->get();

        foreach ($orders as $order){
            $createdAt = Carbon::parse($order->created_at);
            $currentTime = now();

            if ($createdAt->diffInMinutes($currentTime) >= 1) {
                $order->update(['status_id' => 1]);
            }
        }
        return $next($request);
    }
}
