<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Client;

class ClientController extends Controller
{
    public function save(Request $request)
    {
        $validate = $this->validate($request,[
            "client_name"    => "required",
            "client_surname" => "required",
            "client_phone"   => "required|numeric",
            "street"         => "required",
            "town"           => "required",
            "postcode"       => "required|numeric",
            "document"       => "required",
            "birthdate"      => "required|date_format:Y-m-d"
            ]);

        $query = array("client_name"    => $request->client_name,
                       "client_surname" => $request->client_surname,
                       "client_phone"   => $request->client_phone,
                       "street"         => $request->street,
                       "town"           => $request->town,
                       "postcode"       => $request->postcode,
                       "document"       => $request->document,
                       "birthdate"      => $request->birthdate
                       );

        if ($client = Client::firstOrCreate($query)){
            return redirect('/vender/producto/'.$request->product_id);
        } else {
            return redirect('vender/producto'.$request->product_id)->withMessage('No va');
        }
    }
}
