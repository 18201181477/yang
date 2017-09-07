<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class ContactModel extends Model
{
    public function contactall()
    {
        return DB::table('contact')->orderBy('addtime', 'desc')->paginate(5);
    }


    public function contactadd($param)
    {
        return DB::table('contact')->insert($param);
    }
}