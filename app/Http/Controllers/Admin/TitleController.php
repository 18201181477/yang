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
    		dd($res->input());
    		if ($model->add($res->input())) {
    			return redirect('admin/title')->withInput();
    		} else {
    			return redirect()->back()->with('message','出现错误');
    		}
    	}
    	
    }

    /**
     * ajax增加点赞数
     */
    public function ajax(Request $res)
    {   
        // var_dump($res->input());die;
        // var_dump(Title::ajaxUp($res->input()));
        $result = Title::where('id',$res->input('id'))->first();
        $result->zan += $res->input('num');
        echo $result->save()?$result->zan:0;
    }


}
