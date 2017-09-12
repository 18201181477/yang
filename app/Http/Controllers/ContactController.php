<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\ContactModel;
class ContactController extends Controller
{
    public function contact()
    {
        $contactmodel=new ContactModel();
        $arr=$contactmodel->contactall();
        return view('contact.index',['arr'=>$arr]);
    }
    
    public function contactadd()
    {
        $param=$_REQUEST;
        $param['addtime']=time();
        unset($param['_token']);
        $contactmodel=new ContactModel();
        $info=$contactmodel->contactadd($param);
        if($info)
        {
            return redirect()->action('ContactController@contact');
        }
    }

    public function server()
    {
        echo "<pre>";
        print_r($_SERVER);
    }
}