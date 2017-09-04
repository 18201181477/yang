<?php
namespace App\Http\Controllers\Hospitalback;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DoctorController extends Controller
{
    public function doctor()
    {
    	return view('hospitalback.doctor.doctor');
    }

    
}
