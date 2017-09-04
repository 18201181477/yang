<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
   public function weibo(){

       $code = $_GET['code'];
//print_r($code);die;
       $url = "https://api.weibo.com/oauth2/access_token?client_id=1047198682&client_secret=81a80502abbfa6266f859d3b2a417679&grant_type=authorization_code&code=$code&redirect_uri=http://www.small3.com/login/weibo";

       $ch = curl_init();


       curl_setopt($ch, CURLOPT_URL, $url);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
       curl_setopt($ch, CURLOPT_POST, 1);
       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
       curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

       $output = curl_exec($ch);
       $data = json_decode($output,true);

       //获取微博用户的uid和token存进session
       Session::put('uid',$data['uid']);
       Session::put('access_token', $data['access_token']);

       return redirect('login/weibo_login');
   }

    public function weibo_login(){
        //获取微博用户的各种信息
        $url='https://api.weibo.com/2/users/show.json?access_token='.Session::get('access_token').'&uid='. Session::get('uid');
        $weibo_data=file_get_contents($url);
        $weibo_user_message = json_decode($weibo_data,true);


        if($_POST){
            //获取微博用户手机号 邮箱 入库
            $user_data = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'phone' => $_POST['phone'],
                'status' => $_POST['status'],
                'created_at' => date('Y-m-d H:i:s',time()),
                'updated_at' => date('Y-m-d H:i:s',time()),
            ];
            $info = DB::table('users')->insertGetId($user_data);
            $user_oauth_data = [
                'open_id' => Session::get('uid'),
                'user_id' => $info,
                'nickname' =>  $weibo_user_message['name'],
                'type' => '3',//微博用户
                'create_time' => time()
            ];
            DB::table('users_oauth')->insertGetId($user_oauth_data);


        }else{

//            print_r(Session::get('uid'));die;
            $res = DB::table('users_oauth')->where(['open_id' => Session::get('uid')])->get();

//            print_r($res);die;
            if($res){
                //之前使用微博登陆过

            }else{
                //第一次使用微博登录

//            print_r($weibo_user_message);die;
                $data = [
                    'type' => '微博用户',
                    'name' => $weibo_user_message['name'],
                ];
                return view('auth.register_oauth',['data' => $data]);
            }
        }
    }


}
