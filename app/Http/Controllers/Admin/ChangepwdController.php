<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ChangepwdController extends Controller
{
    public function index()
    {
    	return view('admin.changepwd.index');
    }

    public function changepwd()
    {
    	return view('admin.changepwd.changepwd');
    }
    
}
