<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
	protected $table = 'title';
	
	protected $fillable = ['id','title_name','title_img','sort','title_conntent','title_author'];
    public function add($data)
    {
    	$data['title_img'] = \Session::get('imgPath');
    	unset($data['_token']);

    	// dd($data);
    	return $this::create($data)?true:false;
    }

    public function page($num=6)
    {
        return $this::paginate($num);
    }

    static public function str($str)
    {
        return mb_substr($str,0,600,'UTF-8').'……';
    }

   
}
