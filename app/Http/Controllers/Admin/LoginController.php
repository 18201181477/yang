<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\AdminModel;
class LoginController extends Controller
{
    public function index(Request $res)
    {
    	if ($res->isMethod('GET')) {
    		return view('admin.login.index');
    	} else {
    		$validator = \Validator::make($res->input(),[
    			'Admin.name' => 'required|min:2|max:20',
    			'Admin.password' => 'required|min:2|max:20',
    		],[
    			'required' => ':attribute为必填项',
    			'min' => ':attribute长度不符合要求',
    			'max' => ':attribute长度不符合要求',
    		],[
    			'Admin.name' => '*用户名',
    			'Admin.password' => '*密码',
    		]);
    		if ($validator->fails()) {
    			return redirect()->back()->withErrors($validator)->withInput();
    		}

    		if ($res->input('captcha') != \Session::get('captcha')) {
    			return redirect()->back()->with('message','验证码错误');
    		}
    		$model = new AdminModel;

    		if ($model->auth($res->input())) {
    			// echo 55;
    			\Session::put('username',$res->input('Admin.name'));
    			
    			return redirect('admin/index');
    		} else {
    			return redirect('admin/login')->with('message','登录失败');
    		}
    	}
    	
    }


}
