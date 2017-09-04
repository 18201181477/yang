<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
class AuthController extends Controller
{
    public $username = 'name';
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'status' => 'required',
            'phone' => 'required|max:12',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'status' => $data['status'],
            'phone' => $data['phone'],
        ]);
    }

    public function postRegister(Request $res)
    {
        $validator = \Validator::make($res->input(),[
                'User.name' => 'required|min:2|max:20',
                'User.password' => 'required|min:6|max:20',
                'User.status' => 'required|integer',
                'User.email' => 'required',
                'User.email' => ['regex:/^\w{2,16}@(qq|net|163)\.com$/i'],
                'User.password_confirmation' => 'required|min:6|max:20',
                'User.phone' => 'required',
                'User.phone' => ['regex:/^\d{11}$/'],
            ],[
                'required' => ':attribute为必填项',
                'min' => ':attribute长度不符合要求',
                'max' => ':attribute长度不符合要求',
                'regex' => ':attribute格式不正确',
                'integer' => ':attribute必须为数字',
            ],[
                'User.name' => '*用户名',
                'User.password' => '*密码',
                'User.status' => '*注册类型',
                'User.email' => '*邮箱',
                'User.password_confirmation' => '*确认密码',
                'User.phone' => '*手机号码',
            ]);
            if (\Session::get('captcha') != $res->input('captcha')) {
                return redirect()->back()->with('message','验证码错误')->withInput();
            }
            if ($res->input('User.password') != $res->input('User.password_confirmation')) {
                return redirect()->back()->with('sure','2次密码不一致');
            }
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $model = new User();
            if ($data=$model->register($res->input('User'))) {
                \Session::put('user',$data);
                return redirect('index');
            } else {
                return redirect()->back()->with('error','用户名已经存在')->withInput();
            }
    }

    public function postLogin(Request $res)
    {
        $model = new User;
        if ($data = $model->login($res->input())) {
            \Session::put('user',$data);
            return redirect('index');
        } else {
            return redirect()->back()->with('message','用户名或密码错误')->withInput();
        }
    }
}
