<?php

namespace App\Http\Middleware;

use Closure;

class RegionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $appKey = 25729;
        $sign = '2f6a149ac2ea3b9a5d827980eb83e1ef';

        $ipUrl = "http://api.k780.com/?app=ip.local&appkey={$appKey}&sign={$sign}&format=json";
        $ipJson = file_get_contents($ipUrl);
        $ipArr = json_decode($ipJson,true);
        $ip = $ipArr['result']['ip'];

        $addUrl = "http://api.k780.com/?app=ip.get&ip={$ip}&appkey={$appKey}&sign={$sign}&format=json";
        $addJson = file_get_contents($addUrl);
        $addArr = json_decode($addJson,true);
        $str = explode(',',$addArr['result']['att']);
        
        $request->session()->put('address',$str[1]);
        return $next($request);
    }
    
}
