@extends('master')

@section('content')
<div class="container">
	<div class="col-md-12 col-xs-12">
		<h2><a href="{{ url('stoc/'.$brand->name) }}">
			<button class="btn btn-primary">
				<i class="fa fa-arrow-circle-left"></i>
				Volver al listado
			</button>
		</a></h2>
	</div>
    <div  class="col-md-12 col-xs-12">
        <p>¡Un gran poder conlleva una grande responsabilidad!
         Vas a borar el producto {{ $brand->name . " ".$product->model }}, imei: {{ $product->imei }}.
         Te recordamos que una vez borrado un producto no puede ser recuperado.
         Si estas seguro pulsa en "Borrar este producto", si quieres volver pulsa "Vuelve al listado".</p>
        {!! Form::open(['url' => 'borar/producto/'.$product->id,
                       'class' => 'form-horizontal']) !!}

            {{ method_field('DELETE') }}
            <button type="submit"  class="btn btn-danger" id="brand_btn">
                <i class="fa fa-btn fa-trash"></i>Borrar este producto
            </button>
        {!! Form::close() !!}
    </div>
</div>
@endsection