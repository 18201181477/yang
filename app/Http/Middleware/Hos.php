<?php

namespace App\Http\Middleware;

use Closure;

class Hos
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
        // 获取session
        $user = \Session::get('user');

        // 错误信息
        $data = ['message'=>'请进行登录','url' =>'/index/login', 'jumpTime'=>3,'status'=>false];
        
        // 判断是否登录
        if(!empty($user) && $user['status'] == 1) {
            return $next($request);
        } 
        // 判断个人用户
        if(!empty($user) && $user['status'] == 0) {
            $data = ['message'=>'您是个人账号,请进行医院登录登录','url' =>'/index/login', 'jumpTime'=>3,'status'=>false];
        }

        // 未登录重定向
        return redirect('/pc')->with($data);
       
    }
}
