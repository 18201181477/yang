<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class VipController extends Controller
{
    public function index()
    {
    	return view('admin.vip.index');
    }

    public function vip()
    {
    	return view('admin.vip.vip');
    }
    
}
