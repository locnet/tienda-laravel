@extends('master')

@section('content')
<div class="container">
	<div class="col-md-12 col-xs-12">
		<h2><a href="{{ url('stoc/'.$brand) }}">
			<button class="btn btn-primary">
				<i class="fa fa-arrow-circle-left"></i>
				Volver
			</button>
		</a></h2>
	</div>
    <h3 class="blue text-center">{{ $brand. " ".$product->model }}</h3>
    <div class="col-md-12 col-xs-12">    	
    	<div class="col-md-4 col-xs-12">            
	    	<p><span class="blue">Imei:</span> {{ $product->imei }}</p>
	    	<p><span class="blue">Precio de compra:</span> {{ $product->buy_price }} €</p>
	    	<p><span class="blue">Precio de venta:</span> {{ $product->sell_price }} €</p>
		    <p><span class="blue">En almacen desde:</span> {{ $product->created_at }}</p>
    	</div>
    	<div class="col-md-4 col-xs-12">
    		<p><span class="blue">RAM:</span> {{ $phone_details->ram }}</p>
    		<p><span class="blue">ROM:</span> {{ $phone_details->capacity }}</p>
    		<p><span class="blue">CPU:</span> {{ $phone_details->cpu }}</p>
    		<p><span class="blue">SO:</span> {{ $phone_details->so }}</p>
    	</div>
    	<div class="col-md-4 col-xs-12">
    		<p><span class="blue">Pantalla:</span> {{ $phone_details->screen }}</p>
    		<p><span class="blue">Camaras:</span> {{ $phone_details->camera }}</p>
    		<p><span class="blue">Bateria:</span> {{ $phone_details->batery }}</p>
    		<p><span class="blue">Tecnologia:</span> {{ $phone_details->tecnology }}</p>
    	</div>	    
    </div>
</div>
@endsection