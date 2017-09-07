<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class OurteamModel extends Model
{
    public function getAll() {
    	return DB::table('ourteam')->paginate(3);
    }
}
