<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Title;
class TitleController extends Controller
{
    public function index(Request $res)
    {
        $model = new Title;
    	if ($res->isMethod('GET')) {
            $data = $model->page(6);
    		return view('admin.title.index',['data'=>$data]);
    	} else {
    		
    		if ($model->add($res->input())) {
    			return redirect('admin/title')->withInput();
    		} else {
    			return redirect()->back()->with('message','出现错误');
    		}
    	}
    	
    }


}
