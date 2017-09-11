<?php
namespace App\Http\Controllers\Hospitalback;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DoctorController extends Controller
{
    public function doctorshow()
    {
    	 $hos_id = \Session::get('hos_id');
        
         $model = new \App\Models\BannerModel();

         $doctors = new \App\Models\Doctors();
         //分页查询数据
         $arr = $doctors->page(2);


         // dd($arr['data']);die;
        if (empty($arr)) {
            // echo 1;exit;
            $hos_id = \Session::get('hos_id');
             if (!empty($hos_id)) 
            {   
                $data = $model->hospital_useselect('offices',['pid'=>0]);      
            }

             
           $data = json_decode(json_encode($data));
           return view('hospitalback.doctor.doctoradd',['data' => $data]);
        }
        else{
            // dd($data['data']);
        	return view('hospitalback.doctor.doctor',['arr'=>$arr['data']]);
        }
    	
    }
    
    /**
     * 医生信息添加
     * @return [type] [description]
     */
    public function doctoradd(Request $res){
          $file = $res->file('image');
          $user_id = \Session::get('user')['id'];
          $hos_id = \Session::get('hos_id');
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
       $data = $_POST;
       // dd($data);
        //组装数据
        $arr = array(
                'name'         =>  $data['name'],
                'school'       =>  $data['school'],
                'per_info'     =>   $data['per_info'],
                'main'         =>  $data['main'],
                'age'          =>  $data['age'],
                'img'          =>  $path,
                'title'        =>  $data['title'],
                'is_expert'    =>  $data['is_expert'],
                'hos_id'       =>  $user_id,
                'offs_pid_id'  =>  $data['offs_pid_id'],
                'offs_id'      =>  $data['offs_id'],
            );
        // dd($arr);
        $model = new \App\Models\BannerModel();
         //根据uid查询是否已经完善信息
        $res = $model->hospital_add('doctors',$arr);
        echo $res;
    }

    
}
