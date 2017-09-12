<?php
namespace App\Http\Controllers\Hospitalback;

use Illuminate\Http\Request;
use App\Models\Doctors;
use App\Models\OffsHos;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DoctorController extends Controller
{
    public function doctorshow()
    {


    	 $hos_id  = \Session::get('hos_id');
         $docname = isset($_GET['docname'])?$_GET['docname']:null;
         $name    = isset($_GET['name'])?$_GET['name']:null;
        //分页查询 
         $arr = Doctors::join('offices','doctors.offs_id','=','offices.id')
                       ->where('doctors.hos_id','=',$hos_id)
                       ->where('docname','like','%'.$docname.'%')
                       ->where('name','like','%'.$name.'%')
                       ->paginate(4);
        // dd($arr);

       
           //跳转展示页面
        	return view('hospitalback.doctor.doctor')->with(['arr'=>$arr]);
      
    	
    }
    
     /**
      * 医生添加表单页面
      * @return [type] [description]
      */
     public function doctorpage(){

          $hos_id = \Session::get('hos_id');
             if (!empty($hos_id)) 
            {   
              $data = OffsHos::join('offices','offs_hos.offsid','=','offices.id')
                            ->where('offs_hos.hosid','=',$hos_id)
                            ->where('offices.pid','=',0)
                            ->get();
            }

            
                $data = json_decode(json_encode($data));
            return view('hospitalback.doctor.doctoradd',['data' => $data]);
     }

    public function docoffs(){
       $pid     =   $_POST['pid'];
       $hos_id  =   \Session::get('hos_id');
       if (!empty($hos_id)) {
            $data = OffsHos::join('offices','offs_hos.offsid','=','offices.id')
                            ->where('offs_hos.hosid','=',$hos_id)
                            ->where('offices.pid','=',$pid)
                            ->get();
       }
       return json_encode($data);

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
                'docname'      =>  $data['name'],
                'school'       =>  $data['school'],
                'per_info'     =>   $data['per_info'],
                'main'         =>  $data['main'],
                'age'          =>  $data['age'],
                'img'          =>  $path,
                'title'        =>  $data['title'],
                'is_expert'    =>  $data['is_expert'],
                'hos_id'       =>  $hos_id,
                'offs_pid_id'  =>  $data['offs_pid_id'],
                'offs_id'      =>  $data['offs_id'],
            );
        // dd($arr);
        $model = new \App\Models\BannerModel();
         //根据uid查询是否已经完善信息
        $res = $model->hospital_add('doctors',$arr);
        if ($res) {
            return    redirect('hos/doctor'); 
        }
        else{

            return  redirect('hos/doctorpage'); 
        }
        
    }

     /**
      * 医生删除
      * @return [type] [description]
      */
    public function doctordel(){
        $model = new \App\Models\BannerModel();

        $res = $model->hospital_wherdelete('doctors',['doc_id'=>$_POST['id']]);
        if ($res) {
            echo 1;
                    }
    }
    /**
     * 医生信息修改页面
     * @return [type] [description]
     */
    public function updatapage(){
         
    }

    
}
