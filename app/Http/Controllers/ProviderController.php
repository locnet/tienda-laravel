<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provider;
use App\Http\Requests;

class ProviderController extends Controller
{
    private $provider;

    public function __construct(Provider $provider)
    {
        $this->provider = $provider;
    }

    public function index()
    {
    	$provider = $this->provider->lists('name','surname','id')->sort();
    	return view('provider.create_provider',compact('provider'));
    }

    /**
    * @return crea una nueva entrada en providers
    */
    public function store(Request $request)
    {
    	$validate = $this->validate($request, [
            'name'          => 'required',
            'phone'         => 'required|numeric',
            'document'      => 'required',
            'type'          => 'required',
            'street'        => 'required',
            'city'          => 'required',
            'zipcode'       => 'required|numeric'
            ]);
    	
        // busco si tengo el provedor en la base de datos
        $provider = Provider::where('name',$request->name)
                              ->where('surname',$request->surname)
                              ->where('document',$request->document)
                              ->first();
        if(!$provider) {
            $query = array('name'     => $request->name,
                           'surname'  => $request->surname,
                           'phone'    => $request->phone,
                           'document' => $request->document,
                           'type'     => $request->type,
                           'street'   => $request->street,
                           'city'     => $request->city,
                           'zipcode'  => $request->zipcode);

            if(Provider::firstOrCreate($query)) {
                return view('brand.success')
                          ->with('message','Se ha insertado un nuevo provedor!');
            }
        }
    }

    /**
    * @return devuelve los detalles del proveedor
    */
    public function getProvider($id)
    {
        $provider =  $this->provider->find($id);
        return view('provider.view_provider',compact('provider'));
    }
}
