<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminModel extends Model
{
	protected $table = 'admins';
    public function auth($data) 
    {
    	$res = $this::where(['name'=>$data['Admin']['name'],'password'=>md5($data['Admin']['password'])])->first();
    	return $res?true:false;
    }
}
