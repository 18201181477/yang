<?php  
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use \Session;
use app\Models\bannerModel;
/**
* 医院科室管理
*/
class OfficesController extends Controller
{
	public function show()
	{
		    $model = new \App\Models\BannerModel();
		    $data = \Session::get('user');
        // dd($data);
        $user_id = $data['id'];
        $res = bannerModel::where(['user_id'=>$user_id])->first();

        if (!empty($res)) 
          {
            //查询医院用户是否完善医院信息
          $res = bannerModel::where(['user_id'=>$user_id])
                            ->select('id')
                            ->first()
                            ->toArray();
         //查询医院科室与医院的中间表
         $offsid = $model->hospital_useselect('offs_hos',['hosid'=>$res['id']],'offsid');

         foreach ($offsid as $k => $v) {
         	$oid[]= $v['offsid'];
         }
         //当前医院 查询科室
         $office = $model->hospital_useselin('offices','id',$oid);
           
	       foreach($office as $k => $v){
            if($v['pid'] == 0){
                $data[$v['id']] = $v;
            }
          }

         foreach($office as $k => $v){
            if($v['pid'] != 0){
                $data[$v['pid']]['hosid'] = $res['id'] ;
                $data[$v['pid']]['son'][] = $v;
               
            }
         }
				return view('Perfect.offices',['arr'=>$data]);
				
			}
          else{
          	echo '先完善医院信息';
          }
     
	}
  //添加页面
  public function addpage(){
      $model = new \App\Models\BannerModel();
      $user_id = \Auth::user()->id ;
      //查询医院用户是否完善医院信息
          $res = bannerModel::where(['user_id'=>$user_id])
                            ->select('id')
                            ->first()
                            ->toArray();
      if (!empty($res)) 
          {   
          $data['data'] = DB::table('offices')
                    ->where('pid', '=', 0)
                    ->get();            
          }
          $data['hos_id']=$res['id'];
          // dd($data);
          return view('Perfect.officesadd',['data' => $data]);
}

//多级科室显示
  public function offspid(){
      $pid = $_POST['pid'];
      $model = new \App\Models\BannerModel();
      $user_id = \Auth::user()->id ;
      //查询医院用户是否完善医院信息
          $res = bannerModel::where(['user_id'=>$user_id])
                            ->select('id')
                            ->first()
                            ->toArray();
      if (!empty($res)) 
          {       
          $data = DB::table('offices')
                     ->where('pid', '=', $pid)
                     ->get();   
          }

         return json_encode($data);
    }

 //添加
    public function officeadd()
    {
          $model = new \App\Models\BannerModel();
          $hos_id   = $_POST['hos_id'];
          $offs_id  = $_POST['office_pid'];
            //查询是否有重复
            $res = null ;
          foreach ($offs_id as $k => $v) {
            $aidarr = ['hosid'=>$hos_id,'offsid'=>$v];
            $data = DB::table('offs_hos')->where($aidarr)->first();
            if (empty($data)) {
             $res = $model->hospital_add('offs_hos',$aidarr);
           }
          }
        
             return redirect('index/addpage');
          
    }

	
}
?>