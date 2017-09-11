<?php
namespace App\Http\Controllers\Hospitalback;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class OfficesController extends Controller
{
    public function offices()
    {
    	// return view('hospitalback.doctor.doctor');

    	 $model = new \App\Models\BannerModel();
        $data = \Session::get('user');
        $user_id = $data['id'];
        
        // $res = bannerModel::where(['user_id'=>$user_id])->first();
        $res = $model->hospital_useselone('hospital',['user_id'=>$user_id]);

        if (!empty($res)) 
          {
          
           \SESSION::put('hos_id',$res['id']);
         //查询医院科室与医院的中间表
           $offsid = $model->hospital_useselect('offs_hos',['hosid'=>$res['id']],'offsid');

           if (empty($offsid)) {
                return  redirect('hos/addpage'); 
               }  

            foreach ($offsid as $k => $v) {
                $oid[]= $v['offsid'];
            }
        
         //当前医院 查询科室
            $office = $model->hospital_useselin('offices','id',$oid);
          
            foreach($office as $k => $v){
               if($v['pid'] == 0){
                    $date[$v['id']] = $v;
                }
          }
         
           foreach($office as $k => $v){
               if($v['pid'] != 0){
                   $date[$v['pid']]['hosid'] = $res['id'] ;
                   $date[$v['pid']]['son'][] = $v;
                 }
         }

             return view('hospitalback.offices.offices',['arr'=>$date]);
        
      }
          else{
            echo '先完善医院信息';
          }
    }


     //添加页面
  public function addpage(){
      $model = new \App\Models\BannerModel();
      //医院用户id
       $user_id = \Session::get('user')['id'];
       //医院详情id
      $hos_id = \Session::get('hos_id');

        if (!empty($hos_id)) 
        {   
            $data = $model->hospital_useselect('offices',['pid'=>0]);      
        }

         
         $data = json_decode(json_encode($data));
          return view('hospitalback.offices.officesadd',['data' => $data]);
}

//多级科室显示
  public function offspid(){

      $pid = $_POST['pid'];

      $model = new \App\Models\BannerModel();

      $data = $model->hospital_useselect('offices',['pid'=>$pid]); 

         return json_encode($data);
    }

    //添加
    public function officeadd()
    {

          $model = new \App\Models\BannerModel();
          $hos_id   = \Session::get('hos_id');
          $offs_id  = $_POST['office_pid'];
            //查询是否有重复
            // $res = null ;
          foreach ($offs_id as $k => $v) {
            $aidarr = ['hosid'=>$hos_id,'offsid'=>$v];
            $data = $model->hospital_useselone('offs_hos',$aidarr);
            if (empty($data)) {
             $res = $model->hospital_add('offs_hos',$aidarr);
           }
          }
        
             return redirect('hos/addpage');
          
    }

     /**
     * 删除
     */
    public function officesdel(){
        $model = new \App\Models\BannerModel();  
        $pid = $_POST['id'];
        $hos_id = \Session::get('hos_id');
        
        //查询是否是父级分类
        $res = $model->hospital_useselone('offices',['id'=>$pid],['id','pid']) ;
        // dd($res);
        if ($res['pid']===0) {
          $chi = $model->hospital_useselect('offices',['pid'=>$res['id']],$zi='id');
          
          $a = 0 ;
          foreach ($chi as $k => $v) {
           
           $del = $model->hospital_useselone('offs_hos',['hosid'=>$hos_id,'offsid'=>$v['id']]);
           if (is_array($del)) {
               ++$a ;
           }
          }
         if ($a!=0) {
           echo 0 ;
         }
         else{
           $del =  $model->hospital_wherdelete('offs_hos',['hosid'=>$hos_id,'offsid'=>$pid]);

           if ($del) {
              echo 1 ;
           }
         }
          
        }
        else {
           $del = $model->hospital_wherdelete('offs_hos',['hosid'=>$hos_id,'offsid'=>$pid]);

           if ($del==1) {
             echo 1 ;
           }

          
        }
      
    }

    
}
