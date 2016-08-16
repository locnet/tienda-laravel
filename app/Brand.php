<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    //
    protected $fillable = ['name','created_at','updated_at'];
    
    /**
    * @return products, los productos que pertenecen a una marca en concreto
    */
    public function products()
    {
    	return $this->hasMany('App\Product');
    }
    
}
