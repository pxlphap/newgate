<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
    protected $table = "blogs";
    protected $fillable = ['blog_types'];
    public function blog_type(){
    	return $this->belongsTo('App\blogType', 'id_type', 'id');
    }
    public function slide(){
        return $this->belongsTo('App\Slide', 'id_staff', 'id');
    }
    public function bill_detail(){
    	return $this->hasMany('App\BillDetail', 'id_product', 'id');
    }
        public function comment(){
    	return $this->hasMany('App\Comment', 'id_product', 'id');
    }
    
}