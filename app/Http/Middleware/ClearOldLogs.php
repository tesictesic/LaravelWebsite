<?php

namespace App\Http\Middleware;

use App\Models\Log;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Symfony\Component\HttpFoundation\Response;

class ClearOldLogs
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $logs=Log::all();
        foreach ($logs as $log){
            $createdAt = Carbon::parse($log->created_at);
            $currentTime = now();
            if($createdAt->diffInDays($currentTime)>=1){
                $log->delete();
            }
        }
        return $next($request);
    }
}
