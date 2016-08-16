@extends('master')
@section('stoc','class="active"')

@section('content')
<div class="container">
	<div class="col-md-7 col-xs-12">
        <table class="table">
            <tr>
                <th><h3 class="blue">Marca</h3></th>
                <th><h3 class="blue">Modelos en stoc</h3></th>
            </tr>
            @foreach($brands as $brand)
            <tr>
                <td>
                    <p class="lato-200 strong">
                        @if($brand->products()->count() > 0)
                            <a href="{{ url('stoc/'.$brand->name) }}">{{ ucfirst($brand->name) }}</a>
                        @else
                            {{ ucfirst($brand->name) }}
                        @endif
                    </p>
                </td>
                <td>
                    @if($brand->products()->count() === 0)
                        <p class="lato-200 text-center red">
                            {{ $brand->products()->count() }}
                        </p>
                    @else
                        <p class="lato-200 text-center">
                            {{ $brand->products()->count() }}
                        </p>
                    @endif
                </td>
            </tr>
            @endforeach
        </table>       
    </div>
    <div class="col-md-5 col-xs-12">
        <table class="table">
            <th><h3 class="blue">Situacion almacen</h3><th>
            <tr>
                <td><h4 class="blue">Valor stoc neto: </h4></td>
                <td><h4>{{ number_format($stocValue['sell_value'],2) }} €</h4></td>
            </tr>
            <tr>
                <td><h4 class="blue">Valor stoc bruto: </h4></td>
                <td><h4>{{ number_format($stocValue['buy_value'],2) }} €</h4></td>
            </tr>            
            <tr>
                <td><h4 class="blue">Ventas anuales: </h4></td>
                <td><h4>{{ number_format($ordersValue,2) }} €</h4></td>
            </tr>
            <tr>
                <td><h4 class="blue">Ventas de este mes: </h4></td>
                <td><h4>{{ $monthOrders }} €</h4></td>
            </tr>
        </table>
        
    </div>
</div>
@endsection