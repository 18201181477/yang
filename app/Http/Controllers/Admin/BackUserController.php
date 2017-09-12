<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Admin;
class BackUserController extends Controller
{
    public function index()
    {
    	return view('admin.backUser.index');
    }


    // 用户添加
    public function UserAdd() {
    	// 接收用户名
    	$username = Input::get('username');
    	// 密码
    	$passwd = Input::get('passwd');
    	// 用户添加
    	$info = DB::insert("insert into auth_user(username,passwd) values('$username','$passwd')");

    	if($info) {
    		return redirect('/pc')->with(['message'=>'添加成功','url' =>'/admin/BackUserShow', 'jumpTime'=>3,'status'=>false]);
    	} else {
    		return redirect('/pc')->with(['message'=>'添加失败','url' =>'/admin/BackUser', 'jumpTime'=>3,'status'=>false]);
    	}
    }

    // 用户展示
    public function show() {
        // 查询用户信息
        $user_info = DB::table('auth_user')->get();
        // 转化为数组
        $user_info = json_decode(json_encode($user_info),true);

        return view('admin.backUser.show')->with(['data'=>$user_info]);

    }

}