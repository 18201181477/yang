<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function about()
    {
    	$about = DB::table('about')->first();
    	$team = DB::table('ourteam')->take(4)->get();
    	// print_r($team);die;
    	// $about = DB::select('select * from about where aid = 1');
    	// print_r($about);die;
        // return view('about.index', [$about=>'about']);
        // return view('about.index', $about );
        return view('about.index')->with('about', $about)->with('team', $team);
    }
}
