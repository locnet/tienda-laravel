<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhoneDetail extends Model{
	
    protected $fillable = ['model','cpu','ram','capacity','screen','batery',
                           'camera','so','tecnology'];

    public function products()
    {
    	return $this->hasMany('App\Product');
    }
}
