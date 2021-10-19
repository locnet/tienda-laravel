@extends('master')
@section('content')
<div class="container">
    <div class="row">
    	<div class="col-md-12 col-xs-12">
    		<h3>Compra realizada!</h3>
    	</div>
    	<table class="table">
            <tr>
            	<td><h4 class="roboto"><span class="blue">Cliente: </span>
            		{{ $client->client_name." ".$client->client_surname}}
            	</h4></td>
            	<td><h4 class="roboto"><span class="blue">Telefono: </span>
            	    {{ $client->client_phone }}
            	</h4></td>
            	<td><h4 class="roboto"><span class="blue">Orden numero: </span>
            		{{ $order->id }}
            	</h4></td>
            </tr>
            <tr>
            	<td><h4 class="roboto"><span class="blue">Producto:</span> 
            		{{ $order->model}}
            	</h4></td>
            	<td><h4 class="roboto"><span class="blue">Imei:</span> 
            		{{ $order->imei}}
            	</h4></td>
            	<td><h4 class="roboto"><span class="blue">Precio:</span> 
            		<strong>{{ $order->sell_price }} €</strong>
            	</h4></td>
            </tr>
            <tr>
            	<td><a href="{{ url('download/invoice/'.$order->id) }}">
                		<button class="btn btn-success">
                		    <i class="fa fa-file-pdf-o"></i>Imprimir factura
                	    </button>
                    </a>
                </td>
                <td><a href="{{ url('view/invoice/'.$order->id) }}">
                        <button class="btn btn-success">
                            <i class="fa fa-file-pdf-o"></i>Ver factura
                        </button>
                    </a>
                </td>
            </tr>
        </table>
    </div>
</div>
@endsection