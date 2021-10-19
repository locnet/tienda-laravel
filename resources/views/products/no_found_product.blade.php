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
	    
	    <h3>No hemos encontrado ningun producto con el nombre {{$model}}</h3>
	    <p><a href="{{ url('product/create/entry') }}">Crea un nuevo producto</a></p>
    </div>
</div>
@endsection