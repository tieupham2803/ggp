<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
     protected $table = 'products';
    protected $fillable = ['name', 'alias', 'price','intro','content','image','keywords','description','user_id','cate_id'];
    public $timestamps = true;

     public function Cate(){
    	return $this->belongTo('App\Cate');
    }
public function User(){
    	return $this->belongTo('App\User');
    }
public function pimage(){
    	return $this->hasMany('App\ProductImage');
    }
}
