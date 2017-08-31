<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session,Redirect;
use App\Models\OurteamModel;

class MemberController extends Controller
{
    public function index()
    {
    	return view('admin.member.index');
    }

    public function member() {
    	return view('admin.member.member');
    }


    /**
     * [info description] 添加成员信息
     * @return [type] [description]
     */
    public function info()
    {
    	// 接收图片信息
    	$file = Input::file('img');
    	// 接收名称
        $name = Input::get('name');
        // 接收成员简介
        $desc = Input::get('pre_info');
        // 个人网址
        $pre_url = Input::get('pre_url');
        // 添加时间
        $add_time = time();
        // 允许类型
        $allowed_extensions = ["png", "jpg", "gif"];
        // 判断是否允许
        if ($file->getClientOriginalExtension() && !in_array($file->getClientOriginalExtension(), $allowed_extensions)) {
            return ['error' => 'You may only upload png, jpg or gif.'];
        }
        // 保存路劲
        $destinationPath = 'storage/uploads/'; //public 文件夹下面建 storage/uploads 文件夹
        $extension = $file->getClientOriginalExtension();
        $fileName = str_random(10).'.'.$extension;
        // 保存图片
        $file->move($destinationPath, $fileName);
        $filePath = asset($destinationPath.$fileName);
        // 添加
        $info = DB::insert("insert into ourteam(name,img,per_url,per_info,add_time) VALUES ('$name','$filePath','$pre_url','$desc','$add_time')");
		if($info) {
			return redirect('/admin/memberShow');
		} else {
		 	echo "no";
		}
    }

    // 成员信息展示
    public function memberShow() {
    	// 调用Model
    	$ourteam = new OurteamModel;
    	// 获取全部数据
    	$ourteam = $ourteam->getAll();
    	// 转为数组
		$ourteam = json_decode(json_encode($ourteam),true);
		// dd($ourteam);exit;
		return view('admin.member.show')->with('data',$ourteam);
    }

    // 成员信息删除
    public function memberDel() {
    	$id = $_GET['id'];
    	// 删除
    	$del = DB::table('ourteam')->where('id','=',$id)->delete();

    	if($del) {
    		echo 1;
    	} else {
    		echo 0;
    	}
    }
    /**
     * [memberSave description] 成员信息修改
     * @return [type] [description]
     */
    public function memberSave() {
    	if($_POST) {
    		$id = Input::get('id');
    		// 接收图片信息
	    	$file = Input::file('img');
	    	// 接收名称
	        $name = Input::get('name');
	        // 接收成员简介
	        $desc = Input::get('pre_info');
	        // 个人网址
	        $pre_url = Input::get('pre_url');
	        // 添加时间
	        $add_time = time();
	        // 允许类型
	        $allowed_extensions = ["png", "jpg", "gif"];
	        // 判断是否允许
	        if ($file->getClientOriginalExtension() && !in_array($file->getClientOriginalExtension(), $allowed_extensions)) {
	            return ['error' => 'You may only upload png, jpg or gif.'];
	        }
	        // 保存路劲
	        $destinationPath = 'storage/uploads/'; //public 文件夹下面建 storage/uploads 文件夹
	        $extension = $file->getClientOriginalExtension();
	        $fileName = str_random(10).'.'.$extension;
	        // 保存图片
	        $file->move($destinationPath, $fileName);
	        $filePath = asset($destinationPath.$fileName);
	        $arr = [
	        	'name'	=>	$name,
	        	'img'	=>	$filePath,
	        	'per_url'	=>	$pre_url,
	        	'per_info'	=>	$desc,
	        	'add_time'	=>	$add_time,
	        ];
	        // 修改
	        $save = DB::table('ourteam')->where('id',$id)->update($arr);
	        if($save) {
	        	return redirect('/admin/memberShow');
	        } else {
	        	return redirect('/admin/memberShow');
	        }
    	}
    	// 接收ID
    	$id = $_GET['id'];
    	// 查询当前数据
    	$data = DB::table('ourteam')->where('id','=',$id)->first();
    	$data = json_decode(json_encode($data),true);
    	
    	return view('admin.member.save')->with('data',$data);
    }

    
    
}
