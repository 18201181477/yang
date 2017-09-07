<?php
namespace App\Http\Controllers\Hospitalback;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TablesController extends Controller
{
    public function tables()
    {
    	return view('hospitalback.tables.tables');
    }

    
}
