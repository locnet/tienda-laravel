<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Brand;
use App\PhoneDetail;
use App\Order;
use App\Http\Requests;
use Carbon\Carbon;

class StocController extends Controller
{

	private $product;
    private $brand;
    private $order;
    private $phone_details;
    
    public function __construct(Product $product, Brand $brand, 
                                Order $order, PhoneDetail $phone_details){
        $this->product = $product;
        $this->brand = $brand;
        $this->order = $order;
        $this->phone_details = $phone_details;
    }
    
    
    public function index(Product $product)
    {
        $brands = $this->brand->get()->sort();
        $stocValue = $this->product->getStocValue();
        $ordersValue = $this->order->sum('sell_price') - $this->order->sum('buy_price');

        $m = Carbon::now()->month;
        $monthOrders = $this->order->whereMonth('created_at','=',$m)->sum('sell_price') 
                       -
                       $this->order->whereMonth('created_at','=',$m)->sum('buy_price');

        $monthProfit = $this->order->whereMonth('created_at','=',$m)->sum('sell_price');

        return view('stoc/stoc_index',compact('brands','stocValue','ordersValue','monthOrders','monthProfit'));
    }
    /**
     * Devuelve todos los productos de un marca
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */
    public function getBrand($brand) 
    {
        // id brand
        $brand_id = $this->brand->where('name',$brand)->select('id')->first();
        // toate produsele de aceasta marca
        if($brand_id) {
            $products = $this->brand->find($brand_id['id'])->products()
                        ->select('products.model',
                            'products.id as product_id',
                            'providers.id as provider_id',
                            'providers.name',
                            'providers.surname',
                            'phone_details.capacity')
                        ->join('phone_details','phone_detail_id','=','phone_details.id')
                        ->join('providers','provider_id','=','providers.id')
                        ->get();
            if ($products->count() > 0) {
                return view('products/brand',compact('products','brand'));
            } else {
                return "nu am productos, raro";
            }
            
        } else {
            return redirect('/stoc');
        }
       
    }
    
    /**
     * Devuelve un producto.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */
    public function getProduct($brand,$model = null)
    {
        //id del fabricante
        $brand_id = $this->brand->where('name',$brand)->select('id')->first();

        if($brand_id)
        {           
            $product = $this->product
                            ->where('brand_id',$brand_id['id'])
                            ->where('model',$model)
                            ->first();
            if (!$product)
            {
                if ($this->product->where('model','LIKE',"%$model%")->count() > 0)
                {
                    $product = $this->product
                            ->where('brand_id',$brand_id['id'])
                            ->where('model','LIKE',"%$model%")
                            ->first();                   
                }
                else
                {
                    return redirect('/stoc/'.$brand);
                }
            }
            $phone_details = $this->phone_details
                                    ->where('id',$product->phone_detail_id)
                                    ->first();

            return view('products/product',compact('product','brand','phone_details'));
        }       
    }

    /**
     * Selecciona un producto para ser borrado
     *
     * @param  id del producto a borrar
     * @return response
    */
    public function deleteProduct($id) {
        $product = Product::findOrFail($id);
        $brand = $this->brand->find($product->brand_id);
        
        return view('stoc/delete_product',compact('product','brand'));
    }

    /**
     * Borra un producto de la base de datos
     *
     * @param  id del producto
     * @return response
    */
    public function confirmProductDelete($id) {

        $product = Product::findOrFail($id);
        $phone_details = PhoneDetail::findOrFail($product->phone_detail_id);
        $brand = Brand::findOrFail($product->brand_id);

        if($product->delete()){
            if ($phone_details->products()->count() === 0) {
                if( !$phone_details->delete() ){
                    return "Nu se poate sterge acest product";
                }
            }
            // si todavia tengo productos de esta marca vuelvo al listado de la marca
            // si no vuelvo al listado principal
            if($brand->products()->count() > 0) {
                return redirect('stoc/'.$brand->name);
            }
            return redirect('stoc');
        } else {
            return "nu am putut sterge";
        }        
        
    }

}
