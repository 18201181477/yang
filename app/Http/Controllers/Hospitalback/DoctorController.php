<?php
namespace App\Http\Controllers\Hospitalback;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DoctorController extends Controller
{
    public function doctorshow()
    {
    	$hos_id = \Session::get('hos_id');
        
        $model = new \App\Models\BannerModel();
         //分页查询数据
         $data = null;
        if ($data) {
        	
        }
        else{
        	
        }
    	return view('hospitalback.hospital.hospital');
    }

    
}
