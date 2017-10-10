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
    /**
     * [service description] 医院信息展示
     * @return [type] [description]
     */
    public function service()
    {
        // 搜索条件  名称
        $name = isset($_GET['search']) ? $_GET['search'] : '';

        // 分类搜索  ID
        $type_id = isset($_GET['type_id']) ? $_GET['type_id'] : '';

        // 每页展示6条
        $arr = Hospital::where('name','like','%'.$name.'%')->limit(6)->get()->toArray();

        // 定义分类数组
        $type = ['tname'=>'医院分类'];

        // 判断是否存在分类搜索
        if(!empty($type_id)) {
            // 分类 名臣 查询
            $arr = Hospital::where('name','like','%'.$name.'%')->where('h_type','=',$type_id)->limit(6)->get()->toArray();

            // 查询医院分类
            $type = DB::table('hospital_type')->where('tid','=',$type_id)->first();

            // 转化数组
            $type = json_decode(json_encode($type), true);
        }

        // 分类
        $type_info = DB::table('hospital_type')->get();

        $type_info = json_decode(json_encode($type_info), true);

        $data['search'] = $name;
        
    	return view('service.index',['arr'=>$arr,'data'=>$data,'info'=>$type_info,'type'=>$type]);
    }

    /**
     * [ServiceShow description] 医院ajax 搜索
     * @return json
     */
    public function ServiceShow() {
        // 搜索条件
        $name = isset($_GET['search'])?$_GET['search']:'';

        // 当前页
        $page = isset($_GET['page']) ? $_GET['page'] : 1;

        // 最后一条id
        $eid = isset($_GET['eid']) ? $_GET['eid'] : '';

        // 分类id
        $tid = isset($_GET['tid']) ? $_GET['tid'] : '';

        // 每页显示条数
        $page_size = 6;
        // 偏移量
        $offset = ($page-1) * $page_size;

        $arr = Hospital::where('id','>',$eid)->where('name','like','%'.$name.'%')->limit($page_size)->get()->toArray();

        // 判断是否有分类
        if($tid) {
            $arr = Hospital::where('id','>',$eid)->where('name','like','%'.$name.'%')->where('h_type','=',$tid)->limit($page_size)->get()->toArray();
        }
     
        echo json_encode($arr);
    }

    //医院详细信息
    public function info(Request $request,$id)
    {
        $arr = Hospital::where(['id'=>$id])->first()->toArray();

        $offArr = OffsHos::where(['hosid'=>$id])->select('offsid')->get()->toArray();

        $offsId = array();
        foreach ($offArr as $key => $val) {
            array_push($offsId, $val['offsid']);
        }
        $offStr = implode(',', $offsId);
        
        $officeArr = \DB::select("SELECT name,id FROM offices WHERE id IN ($offStr) AND pid=0");
        
        $officeArr = json_decode(json_encode($officeArr), true);
        
        $doctorsArr = Doctors::where(['hos_id'=>$id])->get()->toArray();

        foreach ($doctorsArr as $k => $v) {
            $newArr[$v['offs_pid_id']][] = $v;
        }

        foreach ($officeArr as $k => &$v) {
            $v['id'] = isset($newArr[$v['id']]) ? $newArr[$v['id']] : [];
        }
        
        return view('service.info',['data'=>$arr,'officeArr'=>$officeArr]);
    }

    public function doctor($id)
    {
        $doctorArr = Doctors::where(['doc_id'=>$id])->first()->toArray();

        $hospital = Hospital::where(['id'=>$doctorArr['hos_id']])->first()->toArray();

        $offArr = Doctors::where(['offs_pid_id'=>$doctorArr['offs_pid_id']])->select('offs_id')->get()->toArray();

        $offsId = array();
        foreach ($offArr as $key => $val) {
            array_push($offsId, $val['offs_id']);
        }
        //echo "<pre>";
        //print_r($offsId);die;
        $offStr = implode(',', $offsId);
        
        $officeArr = \DB::select("SELECT name,id FROM offices WHERE id IN ($offStr) AND pid=0");
        
        $officeArr = json_decode(json_encode($officeArr), true);
        
        return view('service.doctor',['doctorArr'=>$doctorArr,'hospital'=>$hospital]);
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

    public function heheda() {
        echo 1;exit;
    }

}
