<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function service()
    {
    	return view('service.index');
    }
}
