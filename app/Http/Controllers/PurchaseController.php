<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Purchase;
use App\Provider;
use App\Product;
use App\Brand;
use App\Http\Requests;
use Route;

class PurchaseController extends Controller
{
    private $purchase;
    private $provider;
    private $product;
    private $brand;

    public function __construct(Purchase $purchase,Provider $provider, Product $product,Brand $brand)
    {
    	$this->purchase = $purchase;
    	$this->provider = $provider;
        $this->product = $product;
        $this->brand = $brand;
    }

	public function index()
	{

		//$compras = $this->purchase->all();
		
		
	    //return view('purchases.search_provider');
	    return view('purchases.purchase_index');
	}
    
    /**
    * @return resultado busqueda proveedor
    */
    public function search(Request $request)
    {
    	$validate = $this->validate($request,[
            'document' => 'required'
    	]);


    	if ($this->provider->where('document',$request->document)->count() > 0){
            
            $provider =  $this->provider->where('document',$request->document)->first();
            return view('purchases.create_purchase',compact('provider'));

    	} else {
            return redirect('provedor');
        }
    }

	/** 
    * @return crea una nueva entrada en purchases (compras)
    */
	 public function store(Request $request)
	 {
	 	/*$this->validate($request, [
            'name'     => 'required',
            'surname'  => 'required',
            'document' => 'required',
            'phone'    => 'required|numeric',
            'street'   => 'required',
            'city'     => 'required',
            'zipcode'  => 'required|numeric',
            'brand'    => 'required',
            'model'    => 'required',
            'imei'     => 'required|numeric',
            'barcode'  => 'numeric',
            'price'    => 'required'
            ]);
        
        return "validat";*/
        if($this->provider->where('document',$request->document)->first() != null){

            $provider = $this->provider->where('document',$request->document)->first();
            $brand = $this->brand->where('name','like','%$request->brand%')->first();

            $purchase_query = array('model'       => $request->model,
                                    'imei'        => $request->imei,
                                    'price'       => $request->price,
                                    'provider_id' => $provider->id);

            if ($purchase = Purchase::firstOrCreate($purchase_query)){
                // si no tengo este fabricante creo uno nuevo
                if ($brand == null){
                    $brand_query = array('name' => $request->brand);
                    if (!$brand_result = Brand::firstOrCreate($brand_query)){
                        return "error al crear nuevo fabricante";
                    }
                }
                // insertamos un nuevo producto con el minimo de datos, luego lo actualizamos
                $product_query = array("model"   => $request->model,
                                       "barcode" => $request->barcode,
                                       "imei"    => $request->imei,
                                       "brand_id"=> $brand_result->id,
                                       "provider_id" => $provider->id,
                                       "buy_price"  => $purchase->price);
                // no puedo tener el mismo telefono en la base de datos
                $imei = Product::where('imei',$request->imei)->count();

                if (!$product_result = Product::firstOrCreate($product_query) && $imei === 0){
                    return "error al crear producto";
                }
                return view('purchases.view_purchase',compact('purchase','provider'))
                           ->withMessage("Compra realizada");
            }

        } else {
            return "no tengo provider";
        }        
	}

    /** 
    * @return buscar una factura rebu por el imei del telefono
    */
    public function searchRebuInvoice()
    {
       return view('purchases.search_rebu_invoice');
    }

    /** 
    * @return devuelve la factura rebu corespondiente a un imei
    */
    public function showRebuInvoice(Request $request)
    {
        //validamos
        $this->validate($request,[
                    'imei' => 'required|numeric']);

        if ($purchase = $this->purchase->where('imei',$request->imei)->first()) {
            $provider = $this->provider->find($purchase->provider_id);
            return view('purchases.view_purchase',compact('purchase','provider'))
                        ->withMessage("Detalles factura");
            return redirect(url('view/rebu-invoice/'.$purchase->id));
        } else {
            return view('purchases.search_rebu_error')->withMessage("Nu exista nici o cumparare cu acest imei!");
        }
    }

}
