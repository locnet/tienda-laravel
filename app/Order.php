<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['brand_id','product_id','imei', 'barcode',
                                 'model','buy_price','sell_price',
                                 'client_id','coments','invoice'];

    public function client()
    {
    	return $this->belongTo('App\Client');
    }                                 
}
