<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content=" @yield('meta_description') ">
        <meta name="google-signin-client_id" content="@yield('google_profile_id')">
        <title>@yield('title')</title>              
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{ asset('css/mystyle.css') }}">   
    </head>
    <body>
        <div class="container">
            <div class="row">
            	<div class="col-md-12">
            		<h2 class="text-center blue">
                        FACTURA {{ $order->id."-".Carbon\Carbon::parse($order->created_at)->year }}
                    <h4 class="roboto text-center">ORIGINAL</h4>
            	</div>
                <div class="col-md-12">
                    <p class="roboto pull-right"><strong>Fecha:</strong>
                        {{Carbon\Carbon::parse($order->created_at)->format('d-m-Y') }}
                    </p>
                </div>
            </div>
            <div class="row login">
                <table class="table condensed">
                    <td>
                        <h4>ADRIAN ION COJOCARU</h4>
                        <p><small>Carretera de Loches 33</br>
                        28500-Arganda del Rey,Madrid</br>
                        Tlf. 91 87 00 693</br>
                        CIF: X3609709-C</small>
                    <td>                
                    <td>
                        <p><small>Cliente nº {{ $order->client_id }}</small></p>
                        <h4><small>
                            {{ strtoupper($client->client_name." ".$client->client_surname) }}
                            </small>
                        </h4>
                        <p><small>Calle: {{ $client->street }}</br>
                        {{ $client->postcode."-".$client->city }}</br>
                        CIF/NIF: {{ $client->document }}</br>
                        Tlf. {{ $client->client_phone }}</br>
                        </small></p>
                    </td>
            </div>
            <div class="row login">
            	<table class="table table-bordered">
                    <tr class="info">
                        <td>Articulo</td>
                        <td>Description</td>
                        <td>Cantidad</td>
                        <td>Precio unidad</td>
                        <td>Tasa IVA</td>
                    </tr>
                    <tr>
                    	<td><p>{{ $order->product_id }}</p></td>
                        <td><p>{{ $brand->name." ".$order->model }}</p></td>
                    	<td><p>1</p></td>
                        <td><p>{{ round(($order->sell_price / 1.21),2) }} €</p></td>
                        <td><p>{{ round($order->sell_price - ($order->sell_price / 1.21),2) }} €</p></td>
                    </tr>                    
                </table>
            </div>
            <div class="row">
                <table class="table table-bordered pull-right col-md-7">
                    <tr class="info">
                        <td>Tasa IVA</td>
                        <td>Total sin IVA (EUR)</td>
                        <td>Total IVA (EUR)</td>
                        <td>Total (EUR)</td>
                    </tr>
                    <tr>
                        <td><p>21%</p></td>
                        <td><p>{{ round(($order->sell_price / 1.21),2) }} €</p></td>
                        <td><p>{{ round($order->sell_price - ($order->sell_price / 1.21),2) }} €</p></td>
                        <td><p>{{number_format((float)$order->sell_price, 2, '.', '')  }} €</p></td>
                    </tr>
                </table>
            </div>
        </div>
    </body>
</html>