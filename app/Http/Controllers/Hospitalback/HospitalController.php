<?php
namespace App\Http\Controllers\Hospitalback;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HospitalController extends Controller
{
    public function hospital()
    {
    	return view('hospitalback.hospital.hospital');
    }

    
}
