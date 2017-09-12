<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Title;
use App\Models\Jilu;
class AboutController extends Controller
{
    public function about()
    {
    	$model = new Title;
        $data = $model->page(3);
        // dd($data);
        $arr = Title::take(4)->get();
        $order=Title::orderBy('zan','desc')->limit(4)->get();
        //echo "<pre>";print_r($order);die;
        return view('about.index',['data'=>$data,'arr'=>$arr,'order'=>$order]);
    }

    public function show(Request $red,$id)
    {    
    	$data = title::find($id)->toArray();
    	return view('about.show_all')->with('data',$data);
    }

    public function zan(Request $res)
    {
        $tid = $res->input('tid');
        $ip = $_SERVER['REMOTE_ADDR'];
        $status = Jilu::hasNo($ip,$tid);
        echo $status?1:0;
    }



}


