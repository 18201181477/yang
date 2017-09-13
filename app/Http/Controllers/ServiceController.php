<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hospital;
use App\Offices;
use App\Queque;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class ServiceController extends Controller
{
    public function service()
    {
        $name = isset($_GET['search'])?$_GET['search']:'';

        $type_id = isset($_GET['type_id'])?$_GET['type_id']:'';

        $arr = Hospital::where('name','like','%'.$name.'%')->limit(6)->get()->toArray();

        if(!empty($type_id)) {
            $arr = Hospital::where('name','like','%'.$name.'%')->where('h_type','=',$type_id)->limit(6)->get()->toArray();
        }

        
        // 分类
        $type_info = DB::table('hospital_type')->get();
        $type_info = json_decode(json_encode($type_info), true);

        $data['search'] = $name;
        
    	return view('service.index',['arr'=>$arr,'data'=>$data,'info'=>$type_info]);
    }

    public function ServiceShow() {
        // 搜索条件
        $name = isset($_GET['search'])?$_GET['search']:'';
        // 当前页
        $page = isset($_GET['page']) ? $_GET['page'] : 1;

        $eid = isset($_GET['eid']) ? $_GET['eid'] : '';
        // 每页显示条数
        $page_size = 6;
        // 偏移量
        $offset = ($page-1) * $page_size;
        // echo $eid;exit;
        $arr = Hospital::where('id','>',$eid)->where('name','like','%'.$name.'%')->limit($page_size)->get()->toArray();
        // dd($arr);
        echo json_encode($arr);
    }

    //医院详细信息
    public function info(Request $request,$id)
    {
        $arr = Hospital::where(['id'=>$id])->first()->toArray();
        // echo "<pre>";
        // print_r($arr);die;
    	return view('service.info',['data'=>$arr]);
    }

    //挂号
    public function queque(Request $request,$id)
    {
        if (! \Auth::user()) {
            return redirect('/index/login');
        } else {
            $model = new Queque();
            $model->user_id = \Auth::user()->id;
            $model->ke_id = $id;
            $model->add_time = time();
            $res = $model->save();
            if ($res) {
                $arr = Offices::where(['id'=>$id])->first()->toArray();
                $ke = $arr['name'];
                return redirect()->back()->with("pay",$ke."挂号成功，请支付挂号金额");
            } else {
                return redirect()->back()->with('error','挂号失败');
            }
        }
        
    }

    //医院科室
    public function department(Request $request,$id)
    {
        $arr = Hospital::where(['id'=>$id])->first()->toArray();

        $data = Offices::paginate(5);
        
    	return view('service.department',['data'=>$arr,'param'=>$data]);
    }
}
