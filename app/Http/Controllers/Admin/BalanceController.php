<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BalanceController extends Controller
{
    public function index()
    {
    	return view('admin.balance.index');
    }

    public function balance()
    {
    	return view('admin.balance.balance');
    }
    
}
