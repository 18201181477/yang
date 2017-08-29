<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ConnoisseurController extends Controller
{
    public function index()
    {
    	return view('admin.connoisseur.index');
    }

    public function connoisseur()
    {
    	return view('admin.connoisseur.connoisseur');
    }
    
}