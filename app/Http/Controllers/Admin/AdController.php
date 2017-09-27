<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Ad;
class AdController extends Controller
{
    public function index()
    {
    	$data = Ad::get();
    	return view('admin.ad.index',['data'=>$data]);
    }
}
