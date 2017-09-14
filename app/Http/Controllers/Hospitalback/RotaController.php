<?php  
namespace App\Http\Controllers\Hospitalback;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Doctors;
use App\Models\Rotatable;

/**
 * 医生值班信息控制器
 */
class RotaController extends Controller
{
      public function rotashow(){
      	$hos_id = \Session::get('hos_id');
      	$doc_id = $_GET['docid'];
        // echo time();die;
        $model = new \App\Models\BannerModel();
        if (!empty($hos_id)&&!empty($doc_id)) {
        	$data = Rotatable::where('docid','=',$doc_id)
        	                 ->orderBy('rotatime', 'desc')
                             ->paginate(4);
             
        	 $week = ['日','一','二','三','四','五','六'];
        	
        	 $ary = Doctors::join('offices','doctors.offs_id','=','offices.id')
                                 ->where('doctors.doc_id','=',$doc_id)
                                 ->first(['name','title','docname','main','school','img','doc_id'])
                                 ->toArray();
                 $arr = ['主任医师','教授','副主任医师','医师','实习医师'];
                 foreach ($arr as $kk => $vv) {
                 	if ($ary['title']==$kk) {
                 	     $ary['title']=$vv ;
                 	}
                 }
                // dd($ary);
        	 	return view('hospitalback.rota.rota',['data'=>$data,'ary'=>$ary]);
        	 // } 
        	 
        }else{

        	return redirect('hos/doctor');
      } 
        }

        public function rotaaddpage(){
        	$doc_id = isset($_GET['docid'])?$_GET['docid']:null;
        	// dd($doc_id);
        	if (empty($doc_id)) {
        		return redirect('hos/doctor');
        	}else{

        		$ary = Doctors::join('offices','doctors.offs_id','=','offices.id')
                                 ->where('doctors.doc_id','=',$doc_id)
                                 ->first(['name','title','docname','doc_id'])
                                 ->toArray();
                 $arr = ['主任医师','教授','副主任医师','医师','实习医师'];
                 foreach ($arr as $kk => $vv) {
                 	if ($ary['title']==$kk) {
                 	     $ary['title']=$vv ;
                 	}
                 }
        		return view('hospitalback.rota.rotaadd',['ary'=>$ary]);
        	}
        	

        }
        /**
         * 值班信息添加
         * @return [type] [description]
         */
        public function rotaadd(){
            $data=$_POST;
            $time = explode('-',$data['rotatime']);
            $docid = $_POST['docid'];
            $rotatime = mktime(0,0,0,$time[1],$time[2],$time[0]);
            $model = new \App\Models\BannerModel();
            $arr = ['rotatime'=>$rotatime,
                     'docid'  =>$docid                       
                      ];
              $res = $model->hospital_add('rotatable',$arr);
              if ($res) {
              	return redirect('hos/rota?docid='.$docid);
              }
        }
        /**
         * 值班信息删除
         * @return [type] [description]
         */
        public function rotadel(){
              $id = $_POST['id'];
              $model = new \App\Models\BannerModel();
              $res = $model->hospital_wherdelete('rotatable',['id'=>$id]);
              if ($res) {
              	echo 1 ;
              }
        }
}
?>