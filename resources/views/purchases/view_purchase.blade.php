@extends('master')
@section('content')
<div class="container">
    <div class="row">
    	<div class="col-md-12 col-xs-12">
            @if($message)
                <h3>{{ $message }}</h3>
            @endif
    	</div>
    	<table class="table">
            <tr>
            	<td><h4 class="roboto"><span class="blue">Comprado de: </span>
            		{{ ucwords($provider->name." ".$provider->surname) }}
            	</h4></td>
            	<td><h4 class="roboto"><span class="blue">Telefono: </span>
            	    {{ $provider->phone }}
            	</h4></td>
            	<td><h4 class="roboto"><span class="blue">Numero factura: </span>
            		{{ "REBU-".$purchase->id."/".Carbon\Carbon::parse($purchase->created_at)->year }}
            	</h4></td>
            </tr>
            <tr>
            	<td><h4 class="roboto"><span class="blue">Producto:</span> 
            		{{ ucwords($purchase->model) }}
            	</h4></td>
            	<td><h4 class="roboto"><span class="blue">Imei:</span> 
            		{{ $purchase->imei}}
            	</h4></td>
            	<td><h4 class="roboto"><span class="blue">Precio:</span> 
            		<strong>{{ $purchase->price }} €</strong>
            	</h4></td>
            </tr>
            <tr>
            	<td>
                    <a href="{{ url('download/rebu-invoice-pdf/'.$purchase->id) }}">
                		<button class="btn btn-success">
                		    <i class="fa fa-file-pdf-o"></i>Imprimir factura
                	    </button>
                    </a>
                </td>
                <td>
                    <a href="{{ url('view/rebu-invoice/'.$purchase->id) }}" target="_blank">
                        <button class="btn btn-success">
                            <i class="fa fa-file-pdf-o"></i>Ver factura
                        </button>
                    </a>
                </td>
        </table>
        <table class="table">
            <tr>
                <td><h4>Observaciones:</h4>
                    <p>{{ ucfirst($purchase->comments) }}</p>
                </td>
            </tr>
        </table>
    </div>
</div>
@endsection