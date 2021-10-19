<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\Http\Controllers;

Route::get('/', function () {
    return view('index');
});
Route::get('/stoc','StocController@index');

Route::get('/stoc/{brand}','StocController@getBrand');

Route::get('/stoc/{brand}/{model?}','StocController@getProduct');

Route::get('/provider/{id}','ProviderController@getProvider');

Route::get('/ventas/mes/actual','OrderController@thisMonthOrders');

/*
|----------------------------------------------------------------
| AUTENTIFICATION & REGISTRO
|----------------------------------------------------------------
*/
Route::get('auth', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Reset password...
Route::get('password/reset', 'Auth\PasswordController@getEmail');
Route::post('password/reset', 'Auth\PasswordController@postEmail');

/*
|-----------------------------------------------------------------
| ADMINISTRACION
|-----------------------------------------------------------------
*/
Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function() {
	
    // crear nuevo fabricante 
	Route::get('/brand/create','BrandController@create');
    
	Route::post('brand/store','BrandController@store');	
    
    // nuevo producto
    Route::get('product','ProductController@index');

	Route::get('product/copy/{id?}','ProductController@copy');

	Route::post('product/search','ProductController@searchProduct');

	Route::get('product/create/entry','ProductController@createNew');

	Route::post('product/store','ProductController@store');

	Route::post('product/update','ProductController@update');

	Route::get('show/product/update/{id}','ProductController@showProductToUpdate');

	Route::get('product/to_update','ProductController@getIncompleteProducts');

    // nuevo provedor
    Route::get('provedor','ProviderController@index');

    Route::post('provider/store','ProviderController@store');

    
	// venta producto

	Route::get('vender','OrderController@index');

	Route::post('buscar/producto/modelo','OrderController@searchName');

	Route::post('buscar/producto/barcode','OrderController@searchBarcode');

	Route::get('vender/producto/{id}','OrderController@startOrder');

	Route::post('vender/producto/{id}','OrderController@finishOrder');

	Route::get('view/order/{id}','OrderController@viewOrder');

	Route::get('download/invoice/{id}','PdfController@downloadPdfInvoice');

	Route::get('view/invoice/{id}','PdfController@viewInvoice');


	// operaciones sobre productos

	Route::get('borar/producto/{id}','StocController@deleteProduct');

	Route::delete('borar/producto/{id}','StocController@confirmProductDelete');

	// clientes
	
	Route::get('clientes/','ClientController@viewAll');

	Route::post('client/save','ClientController@save');

	Route::get('view/client/{id}','ClientController@viewClient');

	Route::patch('client/{id}/update','ClientController@update');       // actualizacion cliente


	// coprar un telefono de segunda mano

	Route::get('comprar','PurchaseController@index');

	Route::get('load/provider/{id}','PurchaseController@loadProvider');

	Route::post('comprar/guardar/{id}','PurchaseController@store');

	Route::post('buscar/proveedor','PurchaseController@search');
	
	

	// post compra segunda mano

	Route::get('view/rebu-invoice/{id}','PdfController@viewRebuInvoicePdf');

	Route::get('download/rebu-invoice-pdf/{id}','PdfController@downloadRebuInvoicePdf');

	Route::get('buscar/factura-rebu','PurchaseController@searchRebuInvoice');

	Route::post('buscar/factura-rebu','PurchaseController@showRebuInvoice');
});