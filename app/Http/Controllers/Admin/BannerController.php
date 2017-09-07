<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BannerController extends Controller
{
    public function index()
    {
    	return view('admin.banner.index');
    }

    public function banner()
    {
    	return view('admin.banner.banner');
    }

    public function banneradd()
    {
    	return view('admin.banner.banneradd');
    }
    
}