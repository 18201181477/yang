<?php
namespace App\Http\Controllers\Hospitalback;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DetailsController extends Controller
{
    public function details()
    {
	  	 $session = \Session::get('user');
     	 $user_id = $session['id'];

	     if (!isset($user_id)) {
	            return   redirect('home');
	          }
	     else{
	         $model = new \App\Models\BannerModel();
	         //根据uid查询是否已经完善信息
	         $res = $model->hospital_useselone('hospital',['user_id'=>$user_id]);

	         if (!empty($res)&&is_array($res)) 
	             {
	            \Session::put('hos_id',$res['id']);
	             return view('hospitalback.details.details',['res'=>$res]);
	             }
	             else{
                
	         	     return view('hospitalback.details.details');
	                  }
	           }
       }




        public function add(Request $res)
    {  
        $session = \Session::get('user');
        $uid = $session['id'];
        //上传图片
        $file = $res->file('image');

        if (!empty($file)) {
           if ($file->isValid()) {
        // 上传目录。 public目录下 uploads/thumb 文件夹
        $dir = 'img/';  
        // 文件名。格式：时间戳 + 6位随机数 + 后缀名
        $filename = time() . mt_rand(100000, 999999) . '.' . $file ->getClientOriginalExtension();          
        $file->move($dir, $filename);
        $path =$filename;//图片路径
        } 
        }
        else
          {
              $path = $_POST['img'];
          }
       
        //接收数据             
        $data = $_POST;
        //组装数据
        $arr = array(
                'name'      =>  $data['name'],
                'url'       =>  $data['url'],
                'image'     =>  $path,
                'profile'   =>  $data['profile'],
                'documents' =>  $data['documents'],
                'address'   =>  $data['address'],
                'x'         =>  $data['x'],
                'y'         =>  $data['y'],
                'phone'     =>  $data['phone'],
                'user_id'   =>  $uid,
                'register'  =>  $data['register'],
            );

        $model = new \App\Models\BannerModel();
         //根据uid查询是否已经完善信息
        $res = $model->hospital_useselone('hospital',['user_id'=>$uid]);
        
   if (empty($res)) 
    {    
        $res = $model->hospital_add('hospital',$arr);
          
        if($res){
           \SESSION::put('hos_id',$res);
            return redirect('hos/index');
        }else{
            return redirect('hos/details');
        }
    }
    else
      {
        $hos_id=$res['id'];
        $upadd = $model->hospital_wherupdate('hospital',['id'=>$hos_id],$arr);
         
         if($upadd){
           \SESSION::put('hos_id',$hos_id);
            return redirect('hos/index');
        }
        else{
            return redirect('hos/map');
        }
      }
   
    }

    
}