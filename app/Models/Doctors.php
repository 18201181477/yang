<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctors extends Model
{
	protected $table = 'doctors';
	


    public function page($num=3)
    {
        return self::paginate($num)->toArray();
    }

    static public function str($str)
    {
        return mb_substr($str,0,600,'UTF-8').'……';
    }

   
}
