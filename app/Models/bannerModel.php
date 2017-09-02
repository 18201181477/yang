<?php
namespace app\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class bannerModel extends Model
{
	protected $table='hospital';
	public function hospital_add($tablename,$data)
	{
		return DB::table($tablename)->insert($data);
	}

	public function hospital_useselect($tablename,$where){
		return DB::table($tablename)->where($where)->first();
	}

}
