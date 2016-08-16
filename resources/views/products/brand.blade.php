@extends('master')

@section('content')
<div class="container">
	<div class="col-md-12 col-xs-12">
		<div class="col-md-6 col-xs-6">
            <h2><a href="{{ url('stoc/') }}">
				<button class="btn btn-primary">
					<i class="fa fa-arrow-circle-left"></i>
					Volver al almacen
				</button>
			</a></h2>
		</div>		
	</div>
    <div class="col-md-12 col-xs-12 table-responsive">
    	<h3 class="lato-200 text-center">Stoc de telefoane {{ ucfirst($brand) }}</h3>
    	<table class="table">
    		 <tr>
    	    	<th><h4 class="blue">Modelo</h4></td>
    	    	<th><h4 class="blue">Capacidad</h4></td>
                <th><h4 class="blue">En almacen desde:</h4></td>
                <th><h4 class="blue">Comprado de:</h4></td>
            </th>
	    	@foreach($products as $product)
	    	   
	    	    <tr>
	    	    	<td>
	    	            <p><a href="{{ url('stoc/'.$brand.'/'.$product->model) }}">
	    	             {{ ucfirst($product->model) }}</a></p>
	    	        </td>
	    	        <td><p>{{ $product->capacity }}</p></td>
	    	        <td>
	    	        	<p>{{ Carbon\Carbon::parse($product->created_at)->format('d-m-Y') }}</p>
	    	        </td>
	    	        <td><p>
	    	        	<a href="{{ url('/provider/'.$product->provider_id) }}">
	    	        		{{ ucwords($product->name." ".$product->surname) }} </a>
	    	        	</p>
	    	        </td>
	    	    </tr>
	    	@endforeach
	    </table>
    </div>
</div>
@endsection