<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Title;
class AboutController extends Controller
{
    public function about()
    {
    	$model = new Title;
        $data = $model->page(2);
        // dd($data);
        return view('about.index',['data'=>$data]);
    }
}
