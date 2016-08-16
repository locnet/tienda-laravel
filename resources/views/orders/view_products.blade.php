@extends('master')

@section('content')
<div class="container">
	<div class="col-md-12 col-xs-12">
		<h2><a href="{{ url('vender') }}">
			<button class="btn btn-default">
				<i class="fa fa-arrow-circle-left"></i>
				Volver
			</button>
		</a></h2>
	</div>
	@foreach($products as $p)
        <div class="col-md-12 col-xs-12 board">    	
    	    <div class="col-md-3 col-xs-12">
    	    	<h4 class="white"><span class="blue">Model: </span>{{ $p->model }}</h4>
    	    	
    	    </div>
    	    <div class="col-md-4 col-xs-12">
	    	    <p class="white"><span class="blue">Imei:</span> {{ $p->imei }}</p>
	    	    <p class="white"><span class="strong blue">En stoc desde:</span>
    	    	    {{ Carbon\Carbon::parse($p->created_at)->format('d-m-Y') }}
    	    	</p>
	    	   
	    	</div>
	    	<div class="col-md-3 col-xs-6">
	    		<h4 class="white"><span class="blue">Precio:</span> {{ $p->sell_price }} €</h4>
                
	    	</div> 
	    	<div class="col-md-2 col-xs-6">
	    		<a href="{{ url('vender/producto/'.$p->id) }}">
		    	    <button class="btn btn-success">
	                	<i class="fa fa-shopping-cart"></i>Vender
	                </button>
	            </a>
            </div>	   	
        </div>
    @endforeach 
</div>
@endsection