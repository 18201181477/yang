<?php
namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
class IndexController extends Controller
{
	
	public function index()
	{	
		$data = \DB::table('hospital')->orderBy('phone','desc')->take(5)->get();

		return view('Index.index')->with('data',$data);	
	}
	public function pay()
	{
		echo '支付成功';
	}
}
