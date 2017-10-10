<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;
class User extends Authenticatable
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','status','phone',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function register($data)
    {
        $res = $this::where(['name'=>$data['name'],'email'=>$data['email']])->first();
        if ($res) {
            return false;
        } else {
            unset($data['password_confirmation']);
            $data['password'] = md5($data['password']);
            $name = abs(crc32($data['name']) % 10);
            

            // 查最后一条ID
            $n_id = DB::table('users_id')->orderBy('id','desc')->first();
            $n_id = json_decode(json_encode($n_id), true);
            $n_id = $n_id['id'] + 2;
            // print_r($n_id);exit;
            $username = $data['name'];
            $email = $data['email'];
            $password = $data['password'];
            $phone = $data['phone'];
            $status = $data['status'];

            $result = DB::insert("insert into users_0".$name." (id,name,email,password,phone,status,created_at,updated_at) values('$n_id','$username','$email','$password','$phone','$status','".date('Y-m-d H:i:s')."','".date('Y-m-d H:i:s')."')");
            // var_dump($result);exit;
            $user_id = DB::insert("insert into users_id values($n_id)");

            if ($result) {
                $data['id'] = $n_id;
                return $data;
            } else {
                return false;
            }
        }
    }


    public function login($data)
    {
        $u = abs( crc32($data['name']) % 10 );

        $db = DB::table('users_0'.$u)->where(['name'=>$data['name'],'password'=>md5($data['password'])])->first();
        
        return $db?json_decode(json_encode($db), true):false;
    }
}
