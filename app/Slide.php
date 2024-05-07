<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    //
   protected $table = "tbl_admin";
    public function blog(){
    	return $this->hasMany('App\blog', 'id_staff', 'id');
    }
}

