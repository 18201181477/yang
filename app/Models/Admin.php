<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
	protected $table = 'admins';
	protected $fillable = ['id','name','password','status'];
    public function auth($data) 
    {
    	$res = $this::where(['name'=>$data['Admin']['name'],'password'=>md5($data['Admin']['password'])])->first();
    	return $res?$res->id:false;
    }

    public function add($data)
    {
    	unset($data['_token']);
    	$data['status'] = 0;
    	$data['password'] = md5($data['password']);
    	return $this::create($data)?true:false;
    }
}
