<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Admin;
class BackMenuController extends Controller
{
	public function MenuAdd() {
		
		if($_POST) {
			$menu_name = Input::get('menu_name');
			$ctrl = Input::get('controller');
			$action = Input::get('action');
			$part = Input::get('parent_id');

			$info = DB::insert("insert into auth_menu(menu_name,controller,action,parent_id) values('$menu_name','$ctrl','$action','$part')");
			if($info) {
				return redirect('/pc')->with(['message'=>'添加成功','url' =>'/admin/BackMenuShow', 'jumpTime'=>3,'status'=>false]);
			} else {
				return redirect('/pc')->with(['message'=>'添加失败','url' =>'/admin/BackUserShow', 'jumpTime'=>3,'status'=>false]);
			}
		} else {
			$menu_info = DB::table('auth_menu')->where('parent_id','=',0)->get();
			// dd($menu_info);
			return view('admin.backMenu.add')->with(['menu'=>$menu_info]);
		}
		
	}

	public function MenuShow() {

		$menu_info = DB::table('auth_menu')->get();

		$menu_info = json_decode(json_encode($menu_info), true);

		$data = $this->get_data($menu_info);

		return view('admin.backMenu.show')->with(['data'=>$data]);

	}

	//角色权限 数据处理
	public function get_data($data, $pid=0, $lebel=0)
	{
		static $arr = array();
		foreach ($data as $k => $v) {
			if ($v['parent_id'] == $pid) {
				$v['lebel'] = $lebel;
				$arr[] = $v;
				//递归
				$this->get_data($data,$v['mid'],$lebel+1);
			}
		}
		//返回递归数组
		return $arr;
	}

}