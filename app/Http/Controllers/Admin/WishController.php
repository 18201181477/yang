<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class WishController extends Controller
{
    public function index()
    {
    	return view('admin.wish.index');
    }

    public function wish()
    {
    	return view('admin.wish.wish');
    }
    
}
