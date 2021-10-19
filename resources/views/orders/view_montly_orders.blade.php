@extends('master')
@section('stoc','class="active"')

@section('content')
<div class="container">
	<div class="col-md-12 col-xs-12">
        <table class="table">
            <tr>
                <th><h3 class="blue">Producto</h3></th>
                <th><h3 class="blue">Precio venta</h3></th>
                <th><h3 class="blue">Cliente</h3></th>
                <th><h3 class="blue">Fecha venta</h3></th>
                <th><h3 class="blue">Detalles venta</h3></th>
            </tr>
            </tr>
            @foreach($orders as $order)
            <tr>
                <td><p class="lato-200 strong">{{ ucwords($order->name . " ".$order->model) }}</p></td>
                <td><p class="lato-200 strong">{{ $order->sell_price }} €</p></td>
                <td>
                    <p class="lato-200 strong">
                        <a href="{{ url('view/client/'.$order->client_id) }}">
                            {{ ucwords($order->client_name." ".$order->client_surname) }} 
                        </a>
                    </p>
                </td>
                <td><p class="lato-200 strong">{{ $order->created_at }} </p></td>
                <td>
                    <p class="text-center">Ver factura
                        <a href="{{ url('/view/order/'.$order->order_id) }}"><span class="fa fa-search"></span></a>
                    </p>
                </td>
            </tr>
            @endforeach
        </table>       
    </div>
    
</div>
@endsection