@extends('master')

@section('content')
<div class="container">
	<div class="col-md-12 col-xs-12">
		<h2><a href="{{ url('stoc') }}">
			<button class="btn btn-primary">
				<i class="fa fa-arrow-circle-left"></i>
				Volver al almacen
			</button>
		</a></h2>
	</div>

    @if($products->count() > 0)
        <h3 class="blue text-center">Productos que hay que actualizar</h3>
        @foreach($products as $product)
            <p><a href="{{ url('show/product/update/'.$product->id) }}">{{ $product->model }}</a></p>
        @endforeach
    @else
         <h3 class="blue text-center">No hay productos que actualizar</h3>
    @endif
    <div class="col-md-12 col-xs-12">    	
    	
    </div>
</div>
@endsection