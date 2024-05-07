<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class blogType extends Model
{
    //
    protected $table = "type_blogs";
    public function blog(){
    	return $this->hasMany('App\blog', 'id_type', 'id');
    }
}
