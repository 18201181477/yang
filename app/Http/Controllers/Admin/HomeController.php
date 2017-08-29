<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
   

    public function home()
    {
    	return view('admin.home.home');
    }

    public function left()
    {
    	return view('layouts.backend_left');
    }

}
