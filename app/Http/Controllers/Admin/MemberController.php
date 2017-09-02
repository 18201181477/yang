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
    public function info(Request $res)
    {
        //上传图片
        $file = $res->file('img');
        if ($file->isValid()) {
            // 上传目录。 public目录下 uploads/thumb 文件夹
            $dir = 'img/';  
            // 文件名。格式：时间戳 + 6位随机数 + 后缀名
            $filename = time() . mt_rand(100000, 999999) . '.' . $file ->getClientOriginalExtension();          
            $file->move($dir, $filename);
            $path = $filename;//图片路径
        } 
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
        // $allowed_extensions = ["png", "jpg", "gif"];
        // // 判断是否允许
        // if ($file->getClientOriginalExtension() && !in_array($file->getClientOriginalExtension(), $allowed_extensions)) {
        //     return ['error' => 'You may only upload png, jpg or gif.'];
        // }

        // 添加
        $info = DB::insert("insert into ourteam(name,img,per_url,per_info,add_time) VALUES ('$name','$path','$pre_url','$desc','$add_time')");
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
    public function memberSave(Request $res) {
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
	       //上传图片
            $file = $res->file('img');
            if ($file->isValid()) {
                // 上传目录。 public目录下 uploads/thumb 文件夹
                $dir = 'img/';  
                // 文件名。格式：时间戳 + 6位随机数 + 后缀名
                $filename = time() . mt_rand(100000, 999999) . '.' . $file ->getClientOriginalExtension();          
                $file->move($dir, $filename);
                $path = $filename;//图片路径
            } 
	        $arr = [
	        	'name'	=>	$name,
	        	'img'	=>	$path,
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
