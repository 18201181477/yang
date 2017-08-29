<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class NewController extends Controller
{
    public function new()
    {
    	return view('new.index');
    }
}
