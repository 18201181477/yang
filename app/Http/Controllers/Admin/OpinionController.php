<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class OpinionController extends Controller
{
    public function index()
    {
    	return view('admin.opinion.index');
    }

    public function opinion()
    {
    	return view('admin.opinion.opinion');
    }
    
}
