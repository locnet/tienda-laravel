@extends('master')
@section('title','Producto actualizado corectamente')
@section('meta_description','')
@section('hotel','class="active"')
@section('content')
    <div class="row">
    	<div class="col-md-10 col-md-offset-1 login">
		    <div class="row well well-lg">
		    	<h2 class="roboto text-center dark-blue">
		    		@if($message)
                        {{ $message['text'] }}
                    @endif
		    	</h2>
		    	<h3 class="text-center">
		    		<a href="{{ url($message['url']) }}">
				    	<button class="btn btn-success">
				    		Volver
				    	</button>
				    </a>
			    </h3>
		    </div>
		</div>
	</div>
@endsection