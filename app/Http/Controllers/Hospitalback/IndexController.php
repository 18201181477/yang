<?php
namespace App\Http\Controllers\Hospitalback;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
       $session = \Session::get('user');
       $user_id = $session['id'];
       if (!isset($user_id)) {
            return   redirect('home');
       }
       else{
            $model = new \App\Models\BannerModel();
            //根据uid查询是否已经完善信息
            $res = $model->hospital_useselone('hospital',['user_id'=>$user_id]);
 
 
            //判断是否添加详情
            if (!empty($res)&&is_array($res)) 
              {
     	            //跳转首页将详情id写入session
                 \Session::put('hos_id',$res['id']);
                  return view('hospitalback.index.index',['res'=>$res]);
               }
            else
              {
                 //未添加详情跳转至详情页面
                  return view('hospitalback.details.details');
              }
       }
    }

    
}
