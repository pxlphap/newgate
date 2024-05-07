<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table = "comment";
    public function blogs(){
    	return $this->belongsTo('App\blog', 'id_product', 'id');
    }
}
