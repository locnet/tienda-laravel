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
        $monthOrders = $this->order->whereMonth('created_at','=',$m)->sum('sell_price')-
                       $this->order->whereMonth('created_at','=',$m)->sum('buy_price');

        return view('stoc/stoc_index',compact('brands','stocValue','ordersValue','monthOrders'));
    }
    /**
     * Devuelve los productos de un marca en particular, por ejemplo Samsung.
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
            $products = $this->brand->find($brand_id['id'])
                        ->products()
                        ->join('phone_details','products.phone_detail_id','=','phone_details.id')
                        ->join('providers','products.provider_id','=','providers.id')
                        ->get();
            if ($products->count() >0) {
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
}
