<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session;
use App\User;

class LoginController extends Controller
{
   public function weibo(){

       $code = $_GET['code'];
      //print_r($code);die;
       $url = "https://api.weibo.com/oauth2/access_token?client_id=1047198682&client_secret=81a80502abbfa6266f859d3b2a417679&grant_type=authorization_code&code=$code&redirect_uri=http://demo.yang.com/login/weibo";
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

        $ch = curl_init();
         curl_setopt($ch, CURLOPT_URL, $url);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
         curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
         $output = curl_exec($ch);
         $weibo_user_message = json_decode($output,true);
         // print_r($weibo_user_message);die;
        if($_POST){
            //获取微博用户手机号 邮箱 入库
            $user_data = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'password'=> md5($_POST['password']),
                'phone' => $_POST['phone'],
                'status' => $_POST['status'],
                'created_at' => date('Y-m-d H:i:s',time()),
                'updated_at' => date('Y-m-d H:i:s',time()),
             ];
            // print_r($three);die;
          $id = DB::table('users')->insertGetId($user_data);
            $user_oauth_data = [
                'open_id' => Session::get('uid'),
                'user_id' => $id,           
                'type' => '3',//微博用户
                'create_time' => time()
            ];
            Session::put('user',$user_data);
            DB::table('users_oauth')->insert($user_oauth_data);
            return redirect()->action('IndexController@index');
        }else{

            $res = DB::table('users_oauth')->where(['open_id' => Session::pull('uid')])->first();
            if($res){
              $data = User::where('id',$res->user_id)->first()->toArray();
              Session::put('user',$data);
              //之前使用微博登陆过
              return redirect()->action('IndexController@index');
            }else{
                //第一次使用微博登录
                return redirect()->action('LoginController@user_bind', ['status' => 1, 'nickname' => $weibo_user_message['name']]);
            }
        }
    }

    //获取微博access_token
    public function bconvertUrlQuery($query)
    {
      $queryParts = explode('&', $query);
      $params = array();
      foreach ($queryParts as $param) {
        $item = explode('=', $param);
        $params[$item[0]] = $item[1];
      }
    return $params;
    }




    public function qq_login()
    {
        
        $access_token = 'https://graph.qq.com/oauth2.0/token?grant_type=authorization_code&client_id=101427412&client_secret=7e65c2c83b4cdd2ee65b4119c3fb0b6f&code='.$_GET['code'].'&redirect_uri=http://demo.yang.com/index/qq_login';
        $access_token_content = file_get_contents($access_token);
        $params = $this->access_token($access_token_content);
        // $resf = 'https://graph.qq.com/oauth2.0/token?grant_type=refresh_token&client_id=101427412&client_secret=7e65c2c83b4cdd2ee65b4119c3fb0b6f&refresh_token='.$params['refresh_token'];
        // $data = file_get_contents($resf);
        //print_r($params);die;
        $user_id = 'https://graph.qq.com/oauth2.0/me?access_token='.$params['access_token'];
        $data = file_get_contents($user_id);
        $data = str_replace('callback(','', $data);
        $data = str_replace(');','', $data);
        $open_id = json_decode($data,true);
        $openid=$open_id['openid']; 
        Session::put('openid',$openid);
        $user_url = 'https://graph.qq.com/user/get_user_info?access_token='.$params['access_token'].'&oauth_consumer_key=101427412&openid='.$openid;
        $user_message = json_decode(file_get_contents($user_url), true);
        
        //查询该用户是否绑定手机号或邮箱
        //print_r(strlen($openid));die;
          $res = DB::table('users_oauth')->where('open_id','=',$openid)->first();
          
          if($res)
          {
            $data = User::where('id',$res->user_id)->first()->toArray();
            \Session::put('user',$data);
            //之前使用扣扣登陆过
            return redirect()->action('IndexController@index');
           }else{
            return redirect()->action('LoginController@user_bind', ['status' => 0, 'nickname' => $user_message['nickname']]);
          }              
        
    }

    //获取扣扣用户access_token
    public function access_token($access_token_content)
    {
        $queryParts = explode('&', $access_token_content);
        $params = array();
        foreach ($queryParts as $param) {
          $item = explode('=', $param);
          $params[$item[0]] = $item[1];
        }  
        return $params;
    }

    //用户授权后进行绑定
    public function user_bind()
    {
       return  view('auth.bind');
    }

    //绑定验证
    public function yan()
    {
        if (\Session::get('captcha') != $_POST['captcha']) {
                return redirect()->back()->with('message','验证码错误')->withInput();
            }
          //组装第三方登录数据
          $three = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'password'=> md5($_POST['password']),
                'phone' => $_POST['phone'],
                'status' => $_POST['status'],
                'created_at' => date('Y-m-d H:i:s',time()),
                'updated_at' => date('Y-m-d H:i:s',time()),
             ];
            // print_r($three);die;
          $id = DB::table('users')->insertGetId($three);
            $user_oauth_data = [
                'open_id' => \Session::get('openid'),
                'user_id' => $id,           
                'type' => '1',//扣扣用户
                'create_time' => time()
            ];
           $fure = DB::table('users_oauth')->insertGetId($user_oauth_data);
          if($id && $fure)
          {
             return view('index.index');
          }
    }

  

}
