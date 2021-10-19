<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Client;
use DB;

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

    /**
    * @return cliente registrado
    */
    public function viewClient($id)
    {
        if ($client = DB::table('clients')->find($id)) {
            return view('clients.view_client',compact('client'))->with('message','');
        } else {
            return "Nu gasesc clientul";
        }
    }

    /**
    * @return todos los clientes registratdos
    */
    public function viewAll() {
        $clients = DB::table('clients')->get();
        return view('clients/view_all_clients',compact('clients'));
    }

    /**
    * @param id cliente que actualizamos
    * @return el cliente registrato
    */

    public function update($id,Request $request) {
        // validation
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

        if(Client::find($id)->update($request->input())) {
            return redirect(url('view/client/'.$id));
        } else {
            $client = Client::find($id);
            return view('clients.view_client',compact('client'))->with('message','Clientul nu a fost modificat!');
        }        
    }
}
    