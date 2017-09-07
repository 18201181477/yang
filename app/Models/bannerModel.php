<?php
namespace app\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class bannerModel extends Model
{
	protected $table='hospital';
	public function hospital_add($tablename,$data)
	{
		return DB::table($tablename)->insertGetId($data);
	}
/**
 * 条件查询多条数据
 * @param  [type] $tablename [description] 要操作的表名
 * @param  [type] $where     [description] 查询的条件 多条件时参数为关联数组 数组下标为字段名 值为条件
 * @param  string $zi        [description] 需要查询的字段 多个字段时为索引数组
 * @return [type]            [description] 返回查询的数据 二维关联数组
 */
	public function hospital_useselect($tablename,$where,$zi='*'){
		$data = json_encode(DB::table($tablename)->select($zi)->where($where)->get()) ;
		return json_decode($data,true);
	}
/**
 * 条件查询单条数据
 * @param  [type] $tablename [description] 要操作的表名
 * @param  [type] $where     [description]查询的条件 多条件时参数为关联数组 数组下标为字段名 值为条件
 * @param  string $zi        [description]需要查询的字段 多个字段时为索引数组
 * @return [type]            [description]返回查询的数据 一维关联数组
 */
    public function hospital_useselone($tablename,$where,$zi="*"){
		$data = json_encode(DB::table($tablename)->select($zi)->where($where)->first()) ;
		return json_decode($data,true);
	}

	/**
 * IN查询单条数据
 * @param  [type] $tablename [description] 要操作的表名
 * @param  [type] $where     [description]查询的条件 为索引数组
 * @param  string $zi        [description]需要查询的字段 
 * @return [type]            [description]返回查询的数据 一维关联数组
 */
	public function hospital_useselin($tablename,$zi,$where){
		$data = json_encode(DB::table($tablename)->whereIn($zi,$where)->get()) ;
		return json_decode($data,true);
	}


	/**
	* 单条数据修改
	* @param  [type] $tablename [description] 要操作的表名
	* @param  [type] $where     [description]修改的条件 多条件时为索引数组
	* @param  [type] $data      [description]修改的数据 索引数组 键为字段名 值为数据  
	* @return [type]            [description]
	*/
	public function hospital_wherupdate($tablename,$where=array(),$data=array()){
		$data = json_encode(DB::table($tablename)->where($where)->update($data)) ;
		return json_decode($data,true);
	}


	 /**
	  * 单条数据删除
	  * @param  [type] $tablename [description] 要操作的表名
	  * @param  array  $where     [description] 删除的条件 多条件时为索引数组键为字段名 值为数据
	  * @return [type]            [description]
	  */
	public function hospital_wherdelete($tablename,$where=array()){
		return $data = DB::table($tablename)->where($where)->delete();
		 
	}

	/**
	  * limit查询
	  * @param  [type] $tablename [description] 要操作的表名
	  * @param  array  $where     [description] 
	  * @return [type]            [description]
	  */

	// public function hospital_wherelimit($tablename,$where=array(),$){

	// }
	
	

}
