<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = ['model','imei','price','provider_id','comments'];

    
    /**
    * @return devuelve los detalles del proveedor
    */
    public function provider()
    {
        return $this->belongsTo('App\Provider');
    }
}
