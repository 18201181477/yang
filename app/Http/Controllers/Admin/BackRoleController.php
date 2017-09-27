<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Admin;
class BackRoleController extends Controller
{
	/**
	 * [RoleAdd description] 角色添加
	 * @author zw
	 */
	public function RoleAdd() {

		if($_POST) {
			// 角色名称
			$role_name = Input::get('role_name');
			// 角色权限
			$mid = $_POST['mid'];

			// 角色名称入库
			$rid = DB::table('auth_role')->insertGetId(['role_name'=>$role_name]);

			// 角色权限添加
			foreach($mid as $val) { 
				$add = DB::table('role_menu')->insert(['rid'=>$rid,'mid'=>$val]);
			}

			if($add) {
				return redirect('/pc')->with(['message'=>'添加成功','url' =>'/admin/BackRoleShow', 'jumpTime'=>3,'status'=>false]);
			} else {
				return redirect('/pc')->with(['message'=>'添加失败','url' =>'/admin/BackMenuAdd', 'jumpTime'=>3,'status'=>false]);
			}
			

		} else {
			$Role_info = DB::table('auth_menu')->get();
			$Role_info = json_decode(json_encode($Role_info), true);
			//调用数据处理
			$data = $this->get_data($Role_info);
			// dd($data);
			return view('admin.backRole.add')->with('role',$data);
		}
		
	}

	//角色权限 数据处理
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

	/**
	 * [RoleShow description] 展示
	 */
	public function RoleShow() {
		// 查询角色
		$role = DB::table('auth_role')
					->join('role_menu','auth_role.rid','=','role_menu.rid')
					->join('auth_menu','role_menu.mid','=','auth_menu.mid')
					->get();
		$role = json_decode(json_encode($role),true);

		$data = [];
		// 循环处理
		foreach ($role as $key => $val) {
			$data[$val['rid']]['rid'] = $val['rid'];
			$data[$val['rid']]['role_name'] = $val['role_name'];
			$data[$val['rid']]['menu_name'][] = $val['menu_name'];
		}

		return view('admin.backRole.show')->with(['data'=>$data]);
	}

	/**
	 * [RoleDel description] 角色删除
	 */
	public function RoleDel() {
		// 接收删除id
		$rid = Input::get('rid');

		// 判断当前角色是否拥有权限
		$menu_info = DB::table('role_menu')->where('rid','=',$rid)->get();

		if(!empty($menu_info)) {
			// 删除当前角色拥有id
			$del = DB::delete("delete from role_menu where rid = $rid");
		}

		if($del) {
			// 删除当前角色
			$role_del = DB::delete("delete from auth_role where rid = $rid");

			// 判断删除是否成功
			if($role_del) {
				echo 1;
			} else {
				echo 0;
			}
			
		}

	}


	public function RoleSave() {

		// 判断是否有POST传值
		if($_POST) {
			// 接收角色id
			$rid = Input::get('rid');
		} else {
			// 角色id
			$id = Input::get('rid');
			// 查询当前角色信息
			$role_info = DB::table('auth_role')
						->join('role_menu','auth_role.rid','=','role_menu.rid')
						->join('auth_menu','role_menu.mid','=','auth_menu.mid')
						->where('auth_role.rid','=',$id)
						->get();
			
			$role_info = json_decode(json_encode($role_info),true);

			// 循环处理
			foreach ($role_info as $key => $val) {
				$data[$val['rid']]['rid'] = $val['rid'];
				$data[$val['rid']]['role_name'] = $val['role_name'];
				$data[$val['rid']]['menu_name'][] = $val['menu_name'];
			}

			// 权限
			$Role_info = DB::table('auth_menu')->get();
			$Role_info = json_decode(json_encode($Role_info), true);
			//调用数据处理
			$arr = $this->get_data($Role_info);
			// dd($data);
			return view('admin.backRole.save')->with(['data'=>$data,'role'=>$arr]);
		}

	}


}