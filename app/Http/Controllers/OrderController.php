<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Input;
use App\Brand;
use App\Product;
use App\Order;
use App\Client;
use DB;
use App\PhoneDetail;

class OrderController extends Controller
{
	private $brand;
	private $product;
    private $client;
    private $order;
    
    public function __construct(Brand $brand, Product $product,
                               Client $client,Order $order){
        $this->brand = $brand;
        $this->product = $product;
        $this->client = $client;
        $this->order = $order;
    }

    /**
    * Show a resource
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
    	$brand = $this->brand->lists('name','id')->sort();
    	return view('orders.order_index',compact('brand'));
    }
    
    /**
    * busca un producto por el nombre
    * @return \Illuminate\Http\Response
    */
    public function searchName(Request $request) {
        $validate = $this->validate($request, [
            'brand_id' => 'required',
            'model'    => 'required']);

        // los telefonos de una marca en concreto
	    $products = $this->brand->find($request->brand_id)
                    ->products()
                    ->where('model','LIKE',"%$request->model%")
                    ->get();
        if($products->count() > 0) {
            return view('orders.view_products',compact('products'));
        } else {

            return view('brand.success')->with('message','El producto buscado no existe!');
        }
	    
        
    }
       
    /**
    * busca un producto por el codigo de barras
    * @return \Illuminate\Http\Response
    */
    public function searchBarcode(Request $request) {
        $validate = $this->validate($request, [
            'barcode'       => 'required'
            ]);
       
        $products = $this->product->where('barcode',$request->input('barcode'))
            ->get();
        if ($products->count() > 0){
            return view('orders.view_products',compact('products'));
        } else {
            return "no hay producto";
        }
                
    }

    /**
    * vender un producto
    * @return el producto que queremos vender
    */
    public function startOrder($product_id)
    {
        $product = $this->product->find($product_id);
        $client_array = $this->client
         ->select(DB::raw('CONCAT(client_surname," ",client_name," / ",birthdate) as client_fullname, id'))
         ->orderBy('client_surname')
         ->lists('client_fullname','id');
        $clients = $this->client->all();
        return view('orders.create_new_order',compact('product','client_array','clients'));
    }

    /**
    * vender un producto
    * @return el producto que queremos vender
    */
    public function finishOrder($id, Request $request)
    {
        $product = $this->product->find($id);
        $client = $this->client->find($request->client);
        // busco el cliente
        if ($client->count() > 0)
        {
            $order_query = array('brand_id'    => $product->brand_id,
                                 'product_id'  => $product->id,
                                 'imei'        => $product->imei,
                                 'barcode'     => $product->barcode,
                                 'model'       => $product->model,
                                 'buy_price'   => $product->buy_price,
                                 'sell_price'  => $product->sell_price,
                                 'client_id'   => $client->id,
                                 'invoice'     => $request->invoice,
                                 'coments'     => $request->coments);

            if($order = Order::firstOrCreate($order_query))
            {
                if($product->delete())
                {
                    // borro la entrada de PhoneDetail si no hay otro movil con
                    // las mismas caracteristicas
                    if($phoneDetail = PhoneDetail::find($product->phone_detail_id))
                    {
                        if($phoneDetail->products->count() == 0)
                        {
                            $phoneDetail->delete();
                        }
                    }
                    
                    return redirect(url('view/order/'.$order->id));
                }
            }
        }
    }

    public function viewOrder($order_id)
    {
        $order = $this->order->find($order_id);
        $client = $this->client->find($order->client_id);
        return view('orders.view_order',compact('order','client'));
    }
}