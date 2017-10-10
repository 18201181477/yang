<?php
namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
class IndexController extends Controller
{
	
	public function index()
<<<<<<< HEAD
	{
		$data = \DB::table('hospital')->orderBy('phone','desc')->take(5)->get();
		return view('Index.index',['data'=>$data]);	
=======
	{	
		$data = \DB::table('hospital')->orderBy('phone','desc')->take(5)->get();

		return view('Index.index')->with('data',$data);	
>>>>>>> 99411ebff62e64acdf0930c488064bcceebd24c6
	}
	public function pay()
	{
		echo '支付成功';
<<<<<<< HEAD
		echo 'hahaha';
	}

	public function kang()
	{
		$id = -25;
		echo Assert::integer($id,'该员工ID必须是一个整数。Got:%s');
		echo Assert::greaterThan($id,0,'该员工ID必须为正整数，得到：%s '); 
=======
		echo 'nishiwojojfosjfoid';
>>>>>>> develop
	}
}
