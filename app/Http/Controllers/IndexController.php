<?php
namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
class IndexController extends Controller
{
	
	public function index()
	{
		// echo \Hash::make();
		return view('Index.index');
	
		// return view('pc.index')->with(['message'=>'账号有误','url'=>'about','jumpTime'=>2]);	
	}
	public function pay()
	{
		echo '支付成功';
	}
}
