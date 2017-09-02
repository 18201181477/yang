<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use \Session;
use app\Models\bannerModel;
/**
 * 医院信息完善
 */
class PerfectController extends Controller
{
   public function perfect(){
  
   $user_id = \Auth::user()->id ;
   if (!isset($user_id)) {
    // $request->session()->flash('status', '信息提示');
    return   redirect('home');
   }else{
  $model = new \App\Models\BannerModel();
   //根据uid查询是否已经完善信息
   $res = bannerModel::where(['user_id'=>$user_id])->first();
   if (!empty($res)) 
    {
    //将完善的信息转换为数组
    $res = bannerModel::where(['user_id'=>$user_id])->first()->toArray();
    }

   if (!empty($res)&&is_array($res)) 
     {
     return view('Perfect.index',['res'=>$res]);
     }

    else
     {
     return view('Perfect.index');
     }
   }
   }
 

     public function add(Request $res)
    {  

         $uid =  \Auth::user()->id;
      
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
            );

        $model = new \App\Models\BannerModel();
       //根据uid查询是否已经完善信息
        $res = bannerModel::where(['user_id'=>$uid])->first();
   if (empty($res)) 
    {
        $res = $model->hospital_add('hospital',$arr);
        if($res){
            return redirect('home');
        }else{
            return redirect('index/perfect');
        }
    }
    else
      {
         $upadd = bannerModel::where(['user_id'=>$uid])->update($arr);
         if($upadd){
            return redirect('home');
        }else{
            return redirect('index/perfect');
        }
      }
   
    }
}