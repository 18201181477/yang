<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Admin;
class UserController extends Controller
{
    public function index()
    {
    	$data = Admin::all();
    	return view('admin.user.index',['data'=>$data]);
    }

    public function userAdd(Request $res)
    {
    	$admin = \Session::get('admin');
    	if ($admin['id'] != 1) {
    		return redirect()->back()->with('message','对不起，你没有该权限');
    	} 
    	$model = new Admin;
    	if ($model->add($res->input())) {
    		return redirect()->back();
    	} else {
    		return redirect()->back()->with('message','添加失败');
    	}
    }
    
}
