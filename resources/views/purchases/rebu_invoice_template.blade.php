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
                        FACTURA REBU-{{ $purchase->id."/".Carbon\Carbon::parse($purchase->created_at)->year }}
                    </h2>
                    <h4 class="roboto text-center">ORIGINAL</h4>
            	</div>
                <div class="col-md-12">
                    <p class="roboto pull-right"><strong>Fecha:</strong>
                        {{Carbon\Carbon::parse($purchase->created_at)->format('d-m-Y') }}
                    </p>
                </div>
            </div>
            <div class="row login">
                <table class="table condensed">
                    <td> 
                        <p>Vendedor:</p>
                        <h4>{{ strtoupper(ucwords($provider->name)." ".ucwords($provider->surname)) }}</h4>
                        <p><small>Calle: {{ ucwords($provider->street) }}</br>
                        {{ ucwords($provider->city)." - ". $provider->postcode }}</br>
                        Tlf. {{ $provider->phone }}</br>                        
                        CIF/NIF: {{ strtoupper($provider->document) }}</br>
                        </small></p>
                    </td>

                    <td>
                        <p>Comprador:
                        <h4>ADRIAN ION COJOCARU</h4>
                        <p><small>Carretera de Loches 33</br>
                        Arganda del Rey,28500 - Madrid</br>
                        Tlf. 91 87 00 693</br>
                        CIF: X3609709-C</small>
                    <td> 
                </table>
            </div>
            <div class="row login">
            	<table class="table table-bordered">
                    <tr class="info">
                        <td>Articulo</td>
                        <td>Imei</td>
                    </tr>
                        <td><p>{{ ucwords($brand->name ." ".$purchase->model) }}</p></td>
                        <td><p><small>{{ $purchase->imei }}</p></small></td>
                    </tr>
                </table>
                <table class="table table-bordered">
                    <tr class="info">
                        <td>Cantidad</td>
                        <td>Precio unidad</td>
                        <td>Total sin IVA</td>
                    </tr>
                    <tr>
                        
                    	<td><p>1</p></td>
                        <td><p>{{ number_format((float)$purchase->price, 2, '.', '') }} €</p></td>
                        <td><p>{{ number_format((float)$purchase->price, 2, '.', '') }} €</p></td>
                    </tr>                    
                </table>
            </div>
            <div class="row">
                <table class="table table-bordered pull-right col-md-7">
                    <tr>
                        <td>Tasa IVA</td>
                        <td><p>0% (Regimen Especial Bienes Usados)</p></td>                        
                    </tr>
                    <tr>
                        <td>Total (EUR)</td>                        
                        <td><p>{{  number_format((float)$purchase->price, 2, '.', '') }} €</p></td>
                    </tr>
                </table>
            </div>
        </div>
    </body>
</html>