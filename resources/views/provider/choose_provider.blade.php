@extends('master')

@section('content')
<div class="container">
	<div class="col-md-12 col-xs-12">
		<h2><a href="{{ url('stoc/') }}">
			<button class="btn btn-primary">
				<i class="fa fa-arrow-circle-left"></i>
				Volver
			</button>
		</a></h2>
	</div>
    <div class="col-md-12 col-xs-12">
	    
	    
	        <div class="col-md-2 col-xs-6">
		        <p class="blue">
		        	<a href="{{ url('load/provider/'.$provider->id) }}">{{ $provider->name . " ".$provider->surname }}<a/>
		        </p>
	    	</div>
	  
    </div>
</div>
@endsection