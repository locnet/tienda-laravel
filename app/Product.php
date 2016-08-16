<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['imei','barcode','model','buy_price',
                           'sell_price','brand_id','phone_detail_id','provider_id'];

    /**
    * @return el fabricante a cual pertenece
    */
    public function brand()
    {
    	return $this->belongsTo('App\Brand');
    }


    /**
    * @return devuelve las caracteristicas de la tabla phone_detail
    */
    public function phone_detail()
    {
        return $this->belongsTo('App\PhoneDetail');
    }
    
    /**
    * @return devuelve los detalles del proveedor
    */
    public function provider()
    {
        return $this->belongsTo('App\Provider');
    }

    public function getStocValue()
    {
    	$data = array('sell_value' => $this->sum('sell_price'),
    		          'buy_value'  => $this->sum('buy_price'),
    		          'net_value'  => $this->sum('sell_price') - $this->sum('buy_price'));
    	return $data;
    }
}
