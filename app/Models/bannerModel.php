<?php
namespace app\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class bannerModel extends Model
{
	public function hospital_add($tablename,$data)
	{
		return DB::table($tablename)->insert($data);
	}

}
