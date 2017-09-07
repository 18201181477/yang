<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Title;
class Jilu extends Model
{
    public $timestamps = false;

    static public function hasNo($ip,$tid)
    {
    	$res = self::where(['ip'=>$ip,'tid'=>$tid])->first();
    	// var_dump($res);
    	if ($res) {
    		return false;
    	} else {
			self::insert(['tid'=>$tid,'ip'=>$ip]);
    		return \DB::table('title')->increment('zan')?true:false;
    	}
    }
}
