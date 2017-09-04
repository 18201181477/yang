<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{
    public function index()
    {
        return view('admin.department.index');
    }

    public function department()
    {
        $data = DB::table('offices')->get();
        $arr = json_decode(json_encode($data),true);

        foreach($arr as $k => $v){
            if($v['pid'] == 0){
                $arr2[$v['id']] = $v;
            }
        }

        foreach($arr as $k => $v){
            if($v['pid'] != 0){
                $arr2[$v['pid']]['son'][] = $v;
            }
        }
        return view('admin.department.department',['arr' => $arr2]);
    }

    public function departmentadd()
    {

        if($_POST){
            $data = DB::table('offices')->get();
            $arr = json_decode(json_encode($data),true);

            //查询是否有重复
            foreach($arr as $k => $v){
                if($v['name'] == $_POST['office_name']){
                    $status = 1;
                }
                if($v['pid'] == 0){
                    $arr2[$v['id']] = $v;
                }
            }

            foreach($arr as $k => $v){
                if($v['pid'] != 0){
                    $arr2[$v['pid']]['son'][] = $v;
                }
            }
            //执行添加
            if(!isset($status)){
                $data_arr = [
                    'name' => $_POST['office_name'],
                    'pid' => $_POST['office_pid'],
                    'created_at' => date('Y-m-d H:i:s',time()),
                    'updated_at' => date('Y-m-d H:i:s',time()),
                ];
                $res = DB::table('offices')->insert($data_arr);

                $data = DB::table('offices')->get();
                $arr = json_decode(json_encode($data),true);
                foreach($arr as $k => $v){
                    if($v['pid'] == 0){
                        $arr3[$v['id']] = $v;
                    }
                }

                foreach($arr as $k => $v){
                    if($v['pid'] != 0){
                        $arr3[$v['pid']]['son'][] = $v;
                    }
                }
                return view('admin.department.department',['arr' => $arr3]);
            }else{
                return view('admin.department.department',['arr' => $arr2,'status' => $status]);
            }





        }else{
            $data = DB::table('offices')->where('pid', '=', 0)->get();
            return view('admin.department.departmentadd',['data' => $data]);
        }
    }

    /**
     * 删除
     */
    public function departmentdel(){
        $id = $_POST['id'];

        $res = DB::table('offices')->where(['id' => $id])->orWhere(['pid' => $id])->delete();
        if($res){
            return 1;
        }
    }

}