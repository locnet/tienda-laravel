<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Client;
use App\Order;
use App\Product;
use App\Purchase;
use App\Provider;
use App\Brand;

class PdfController extends Controller
{
    private $client;
    private $order;
    private $product;
    private $purchase;
    private $provider;
    private $brand;
    
    public function __construct(Client $client,Order $order,Product $product,
                               Provider $provider, Purchase $purchase, Brand $brand){
        $this->client = $client;
        $this->order = $order;
        $this->product = $product;
        $this->provider = $provider;
        $this->purchase = $purchase;
        $this->brand = $brand;
    }

    // generar el pdf factura venta telefono
    public function generatePdfInvoice($order_id){
        $order = $this->order->find($order_id);
        $client = $this->client->find($order->client_id);
        $brand = $this->brand->find($order->brand_id);

        if ($order != null  && $client != null && $brand != null) {
            return view('orders.invoice_template',compact('order','client','brand'));
        
            return \PDF::loadView('orders.invoice_template',compact('order','client','brand'))
               ->download('factura'.$order_id.'.pdf');
        } else {
            return view('orders.error')
                  ->withMessage("Error! No se ha podido generar la factura, intentalo otra vez");
        }
        
    }

    // generar factura compra de particular, rebu
    public function downloadRebuInvoicePdf($purchase_id)
    {
        $purchase = $this->purchase->find($purchase_id);
        $provider = $this->provider->find($purchase->provider_id);
        $product = $this->product->where('imei',$purchase->imei)->first();
        $brand = $this->brand->find($product->brand_id);

        if ($purchase != null && $provider != null) {
            //return view('purchases.rebu_invoice_template',compact('purchase','provider'));
            return \PDF::loadView('purchases.rebu_invoice_template',compact('purchase','provider','brand'))
                                 ->download('factura_rebu'.$purchase_id.'.pdf');
        } else {
            return view('orders.error')
                   ->withMessage("Error! El proceso de generar la factura a fallado, intentalo de nuevo.");
        }
        
    }

    // ver pdf factura rebu
    public function viewRebuInvoicePdf($purchase_id)
    {
        $purchase = $this->purchase->find($purchase_id);
        $provider = $this->provider->find($purchase->provider_id);
        $product = $this->product->where('imei',$purchase->imei)->first();
        $brand = $this->brand->find($product->brand_id);

        if ($purchase != null && $provider != null) {
            return view('purchases.rebu_invoice_template',compact('purchase','provider','brand'));
            //return \PDF::loadView('purchases.rebu_invoice_template',compact('purchase','provider'))
              //                 ->download('factura_rebu'.$purchase_id.'.pdf');
        } else {
            return view('orders.error')
                   ->withMessage("Error! El proceso de generar la factura a fallado, intentalo de nuevo.");
        }
        
    }
}
