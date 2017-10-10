<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
//use think\db;
//use think\migration\db;
use DB;
class User extends Authenticatable
{
    protected $table = 'users';

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
            $number = abs(crc32($data['name']))%10;
            $u_id = DB::table('users_id')->orderBy('id','desc')->first();
            $u_id = json_decode(json_encode($u_id), true);
            //print_r($u_id);die;
            $u_id = $u_id['id']+1;
            $username = $data['name'];
            $email = $data['email'];
            $password = $data['password'];
            $phone = $data['phone'];
            $status = $data['status'];

            $result = DB::insert("insert into users_0".$number." (id,name,email,password,phone,status,created_at,updated_at) values('$u_id','$username','$email','$password','$phone','$status','".date('Y-m-d H:i:s')."','".date('Y-m-d H:i:s')."')");
            // var_dump($result);exit;
            $user_id = DB::insert("insert into users_id values($u_id)");
            if($result)
            {
                $data['id'] = $u_id;
                return $data;
            }
            else {
                return false;
            }
           /* $result = $this::create($data);
            if ($result->save()) {
                $data['id'] = $result->id;
                return $data;
            } else {
                return false;
            }*/
        }
    }


    public function login($data)
    {


        $number = abs(crc32($data['name']))%10;
        $this->table = 'users_0'.$number;


        $res = $this::where(['name'=>$data['name'],'password'=>md5($data['password'])])->first();
        return $res?$res->toArray():false;
    }
}
