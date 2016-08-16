<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['client_name','client_surname',
                           'client_phone','town','street',
                           'postcode','document','birthdate'];

    /**
    * @return orders, las compras hechas por un cliente
    */
    public function orders()
    {
    	return $this->hasMany('App\Order');
    }

    /**
    * @return full_name, devuelve el nombre + apellido
    */
    public function client_fullname()
    {
        return $this->client_name. " ".$this->client_surname;
    }
}
