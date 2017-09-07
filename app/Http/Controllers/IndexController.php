<?php
namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
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
}
