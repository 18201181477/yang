<?php

namespace App\Http\Middleware;

use Closure;

class Upload
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$str)
    {
        $this->img($request,$str);
        return $next($request);
    }

    private function img($res,$str)
    {
        //上传图片
        $file = $res->file($str);
        if ($file->isValid()) {
            // 上传目录。 public目录下 uploads/thumb 文件夹
            $dir = 'img/';  
            // 文件名。格式：时间戳 + 6位随机数 + 后缀名
            $filename = time() . mt_rand(100000, 999999) . '.' . $file ->getClientOriginalExtension();          
            $file->move($dir, $filename);
            \Session::put('imgPath',$filename);
        }
    }
}
