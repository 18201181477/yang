<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AppointmentController extends Controller
{
    public function index()
    {
    	return view('admin.appointment.index');
    }

    public function appointment()
    {
    	return view('admin.appointment.appointment');
    }
    
}
