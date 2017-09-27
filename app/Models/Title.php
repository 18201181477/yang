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

    public function page($num=6,$res=null)
    {
        $name = empty($res['name'])?'':$res['name'];
        // \DB::connection()->enableQueryLog(); // 开启查询日志
        $result = self::where("title_author",'like','%'.$name.'%')->paginate(6);//sql语句
        // $query = \DB::getQueryLog(); // 获取查询日志
        // dump($query); // 即可查看执行的sql，传入的参数等等
       
        return $result;
    }

    static public function str($str)
    {
        return mb_substr($str,0,600,'UTF-8').'……';
    }

    
}
