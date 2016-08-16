<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    //
    protected $fillable = ['name','surname','document','phone','type','street','city','zipcode'];

    /**
    * @return los productos comprados de un proveedor
    */
    public function products(){
    	$this->hasMany('App\Product');
    }
  
    /**
    * @return los productos comprados de un proveedor
    */
    public function compras(){
    	$this->hasMany('App\Purchase');
    }
}
