<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exceptions\Handler;
use App\Http\Requests;
use Input;
use App\Product;
use App\Brand;
use App\PhoneDetail;
use App\Provider;
use DB;

class ProductController extends Controller
{

  	private $product;
  	private $brand;
    private $provider;
    private $phoneDetail;
  	
  	public function __construct(Product $product, Brand $brand, Provider $provider,
                                PhoneDetail $phoneDetail){

        $this->product = $product;
        $this->brand = $brand;
        $this->provider = $provider;
        $this->phoneDetail = $phoneDetail;
  	}
    
	
    public function index(Request $request)
    {
        $message = false;
        $model = $request->model;
      	return view('products.create_new_product',compact('message','model'));
    }

    /**
    * crea un nuevo producto copiando otro
    */
    public function copy($id = null)
    {
        if ($id){
            $product = $this->product->where('id',$id)->first();
            $details = $product->find($id)->phone_detail->first();
            $brand = $this->brand->lists('name','id')->sort();
            $provider = $this->provider
                    ->select(DB::raw('CONCAT(name, " ",surname) as provider_name'),'id')
                    ->orderBy('provider_name')
                    ->lists('provider_name','id')->sort();

            return view('products/copy_product',compact('product','details','brand','provider'));
        }
    }

    /**
    * buscar producto
    * @param \Illuminate\Http\Request $request
    * @return \Illuminate\Http\Response
    */
        
    public function searchProduct(Request $request){
        $validate = $this->validate($request, ['model' => 'required']);

        // busco si tengo el mismo producto en la base de datos
        // si lo tengo me ahorro introducir las caracteristicas
        if ($this->product->where('model','LIKE',"%$request->model%")->count() > 0) {

            $products = $this->product->where('model','LIKE',"%$request->model%")->get();

            return view('products/choose_product',compact('products'));
            
        } else {
            $model = $request->model;
            return view('products.no_found_product')->with('model');
        }
    }

    /**
    * crea un nuevo producto
    * @param \Illuminate\Http\Request $request
    * @return \Illuminate\Http\Response
    */
     
    public function createNew (Request $request) 
    {
        // crea un producto nuevo
        $provider = $this->provider
                    ->select(DB::raw('CONCAT(name, " ",surname) as provider_name'),'id')
                    ->orderBy('provider_name')
                    ->lists('provider_name','id')->sort();

        $brand = $this->brand->lists('name','id')->sort();
        $model = $request->model;
        $message = true;
        return view('products.create_new_product',compact('brand','message','model','provider'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validate = $this->validate($request, [
            'imei'        => 'required|numeric',
            'barcode'     => 'required',
            'model'       => 'required',
            'buy_price'   => 'required|numeric',
            'sell_price'  => 'required|numeric',
            'brand_id'    => 'required|numeric',
            'cpu'         => 'required',
            'ram'         => 'required',
            'capacity'    => 'required',
            'screen'      => 'required',
            'batery'      => 'required',
            'camera'      => 'required',
            'so'          => 'required',
            'tecnology'   => 'required',
            'provider_id' => 'required'
            ]);
        // si no tengo el imei en la base de datos
        if($this->product->where('imei',$request->imei)->count() === 0) {            
            
            $phone_details_query = array(
                                   'model'     => $request->model,
                                   'cpu'       => $request->cpu,
                                   'ram'       => $request->ram,
                                   'capacity'  => $request->capacity,
                                   'screen'    => $request->screen,
                                   'batery'    => $request->batery,
                                   'camera'    => $request->camera,
                                   'so'        => $request->so,
                                   'tecnology' => $request->tecnology );

            // busco en phone_detail una entrada igual
            $phoneDetail = PhoneDetail::where('model',$request->model)
                                      ->where('capacity',$request->capacity)
                                      ->first();
            // si no lo tengo creo uno nuevo
            if(!$phoneDetail) {
                $phoneDetail = PhoneDetail::firstOrCreate($phone_details_query);
            }   
            // se ha creado una nueva entrada en phone_detail
            if($phoneDetail){                
                $product_query = array(
                            'imei'            => $request->imei,
                            'barcode'         => $request->barcode,
                            'model'           => $request->model,
                            'buy_price'       => $request->buy_price,
                            'sell_price'      => $request->sell_price,
                            'brand_id'        => $request->brand_id,
                            'phone_detail_id' => $phoneDetail->id,
                            'provider_id'     => $request->provider_id);
                // creamos un producto nuevo
                if(Product::firstOrCreate($product_query)){
                
                    return view('brand.success')
                          ->with('message','Se ha insertado un nuevo producto!');
                }
            } else {
                return view('brand.success')->with('message','No se puede insertar las 
                    caracteristicas del telefono!');
            }

                      
        } else {
            return view('brand.success')->with('message','Ya tenemos este producto!');
        }
        
    }


    /**
     * Update a product.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $this->validate($request,[
            'brand'       => 'required',
            'model'       => 'required',
            'imei'        => 'required|numeric',
            'barcode'     => 'numeric',
            'buy_price'   => 'required',
            'sell_price'  => 'required|numeric',
            'provider_id' => 'required|numeric',
            'cpu'         => 'required',
            'ram'         => 'required',
            'capacity'    => 'required',
            'screen'      => 'required',
            'batery'      => 'required',
            'camera'      => 'required',
            'so'          => 'required',
            'tecnology'   => 'required'
            ]);
        // busco en phone_detail una entrada igual
        $phoneDetail = PhoneDetail::where('model',$request->model)
                                      ->where('capacity',$request->capacity)
                                      ->first();
        $product = $this->product->where('imei',$request->imei)->first();

        if (!$phoneDetail) {
            // no tengo una entrada igual, creo una
            $phone_details_query = array(
               'model'     => $request->model,
               'cpu'       => $request->cpu,
               'ram'       => $request->ram,
               'capacity'  => $request->capacity,
               'screen'    => $request->screen,
               'batery'    => $request->batery,
               'camera'    => $request->camera,
               'so'        => $request->so,
               'tecnology' => $request->tecnology );

            $phoneDetail = PhoneDetail::firstOrCreate($phone_details_query);
            if (!$phoneDetail) {
                return "NO puedo crear detalles";
            }
        } 

        if($product->count() > 0) {
            $product->imei     = $request->imei;
            $product->barcode  = $request->barcode;
            $product->sell_price = $request->sell_price;
            $product->phone_detail_id = $phoneDetail->id;

            if(!$product->save()) {
                return "nu pot actualiza productul";
            } else {
                $message = array('text' => "Produs actualizat corect!",
                                 'url'  => 'product/to_update');
                return view('products.success',compact('message'));
            }
        }
    }

    /**
     * Listado productos sin actualizar.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getIncompleteProducts()
    {
        $products = $this->product->where('phone_detail_id','0')->get();
        return view('products.incomplete_products',compact('products'));
    }

    /**
     * Actualizar un producto incompleto.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function showProductToUpdate($id)
    {
        $product = $this->product->find($id);
        $brand = $this->brand->find($product->brand_id);
        $details = $this->phoneDetail->find($product->phone_detail_id);
        $provider = $this->provider->find($product->provider_id);
        return view('products/update_incomplete_product',compact('product','details','brand','provider'));
    }
}

