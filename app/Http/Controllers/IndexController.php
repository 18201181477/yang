<?php
namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use Webmozart\ Assert\Assert ;
class IndexController extends Controller
{
	
	public function index()
	{
		return view('Index.index');	
	}
	public function pay()
	{
		echo '支付成功';
	}

	public function kang()
	{
		$id = -25;
		echo Assert::integer($id,'该员工ID必须是一个整数。Got:%s');
		echo Assert::greaterThan($id,0,'该员工ID必须为正整数，得到：%s '); 
	}
}
