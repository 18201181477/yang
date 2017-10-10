<?php
namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
class IndexController extends Controller
{
	
	public function index()

	{
		$data = \DB::table('hospital')->orderBy('phone','desc')->take(5)->get();
		return view('Index.index',['data'=>$data]);
	}
	public function pay()
	{
		echo '支付成功';

		echo 'hahaha';
	}

	public function kang()
	{
		$id = -25;
		echo Assert::integer($id,'该员工ID必须是一个整数。Got:%s');
		echo Assert::greaterThan($id,0,'该员工ID必须为正整数，得到：%s '); 

		echo 'nishiwojojfosjfoid';

	}
}
