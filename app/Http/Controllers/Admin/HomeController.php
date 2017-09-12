<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
   

    public function home()
    {
    	return view('admin.home.home');
    }

    public function left()
    {
    	return view('layouts.backend_left');
    }

    public function index() {
    	
    	return view('admin.index.index');
    }

    public function index_left() {
    	$arr = DB::table('auth_menu')->get();
    	$arr = json_decode(json_encode($arr), true);

    	$data = $this->get_data($arr);
    	// dd($data);
    	return view('admin.inc.backend_left')->with(['data'=>$data]);
    }

    public function get_data($arr)
	{
		//循环处理数组
		foreach ($arr as $k => $v) {
			if ($v['parent_id']==0) {
				$data[$v['mid']] = $v;
			}
			else
			{
				$data[$v['parent_id']]['child'][] = $v;
			}
		}
		return $data;
	}



}
