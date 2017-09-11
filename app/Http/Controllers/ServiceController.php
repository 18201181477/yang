<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hospital;
use App\Offices;
use App\Queque;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function service()
    {
        $name = isset($_GET['search'])?$_GET['search']:'';

        $arr = Hospital::where('name','like','%'.$name.'%')->get()->toArray();
        
    	return view('service.index',['arr'=>$arr]);
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
