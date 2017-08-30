<?php
namespace App\Http\Controllers\Admin;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use app\Models\bannerModel;

class BannerController extends Controller
{
    public function index()
    {
    	return view('admin.banner.index');
    }

    public function banner()
    {
    	return view('admin.banner.banner');
    }

    public function banneradd()
    {
    	return view('admin.banner.banneradd');
    }

    public function add(Request $res)
    {
        //上传图片
        $file = $res->file('image');
        if ($file->isValid()) {
        // 上传目录。 public目录下 uploads/thumb 文件夹
        $dir = 'img/';  
        // 文件名。格式：时间戳 + 6位随机数 + 后缀名
        $filename = time() . mt_rand(100000, 999999) . '.' . $file ->getClientOriginalExtension();          
        $file->move($dir, $filename);
        $path =$filename;//图片路径
       
        } 
        //接收数据             
        $data = $_POST;
        //组装数据
        $arr = array(
                'name'      =>  $data['name'],
                'url'       =>  $data['url'],
                'image'     =>  $path,
                'type'      =>  $data['type'],
                'profile'   =>  $data['profile'],
                'documents' =>  $data['documents'],
                'grade'     =>  $data['grade'],
                'address'   =>  $data['address'],
                'route'     =>  $data['route'],
                'phone'     =>  $data['phone'],
                'sort'      =>  $data['sort'],
            );
        $model = new \App\Models\BannerModel();
        $res = $model->hospital_add('hospital',$arr);
        if($res){
            return view('admin.banner.banner');
        }else{
            return view('admin.banner.banneradd');
        }
    }
    
}