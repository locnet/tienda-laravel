@extends('master')
@section('comprar','class="active"')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1 login">
        	<div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="roboto text-center white">
                        Comprar a un particular
                    </h4>
                </div>
                <div class="panel-body">
                    {!! Form::open(['url' => 'comprar/guardar',
                                    'class' => 'form-horizontal']) 
                    !!}
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            	<div class="col-md-4 control-label">
                            		{!! Form::label('name','Nombre') !!}
                            	</div>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="fa fa-male"></span>
                                        </div> 
                                        	{!! Form::input('text','name',ucwords($provider['name']), 
                                                            ['class' => 'form-control']) 
                                            !!} 
                                    </div>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group{{ $errors->has('surname') ? ' has-error' : '' }}">
                                <div class="col-md-4 control-label">
                                    {!! Form::label('surname','Apellidos') !!}
                                </div>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="fa fa-male"></span>
                                        </div> 
                                            {!! Form::input('text','surname',ucwords($provider['surname']), 
                                                            ['class' => 'form-control']) 
                                            !!} 
                                    </div>
                                    @if ($errors->has('surname'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('surname') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group{{ $errors->has('document') ? ' has-error' : '' }}">
                            	<div class="col-md-4 control-label">
                            		{!! Form::label('document','NIE/CNP') !!}
                            	</div>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="fa fa-map-marker"></span>
                                        </div> 
                                        	{!! Form::input('text','document',$provider['document'], 
                                                            ['class' => 'form-control']) 
                                            !!} 
                                    </div>
                                    @if ($errors->has('document'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('document') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            	<div class="col-md-4 control-label">
                            		{!! Form::label('phone','Tlf. contacto') !!}
                            	</div>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="fa fa-phone"></span>
                                        </div> 
                                        	{!! Form::input('text','phone',$provider['phone'], 
                                                            ['class' => 'form-control']) 
                                            !!} 
                                    </div>
                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        	                    
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group{{ $errors->has('street') ? ' has-error' : '' }}">
                                <div class="col-md-4 control-label">
                                    {!! Form::label('street','Calle') !!}
                                </div>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="fa fa-map-marker"></span>
                                        </div> 
                                        {!! Form::input('text','street',ucwords($provider['street']), 
                                                            ['class' => 'form-control']) 
                                        !!}
                                    </div>
                                    @if ($errors->has('street'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('street') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-xs-12">
                            <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                                <div class="col-md-4 control-label">
                                    {!! Form::label('city','Ciudad') !!}
                                </div>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="fa fa-map-marker"></span>
                                        </div> 
                                        {!! Form::input('text','city',ucwords($provider['city']), 
                                                            ['class' => 'form-control']) 
                                        !!}
                                    </div>
                                    @if ($errors->has('city'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('city') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group{{ $errors->has('zipcode') ? ' has-error' : '' }}">
                                <div class="col-md-4 control-label">
                                    {!! Form::label('zipcode','Codigo postal') !!}
                                </div>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="fa fa-map-marker"></span>
                                        </div> 
                                        {!! Form::input('text','zipcode',$provider['zipcode'], 
                                                            ['class' => 'form-control']) 
                                        !!}
                                    </div>
                                    @if ($errors->has('zipcode'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('zipcode') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-xs-12">
                            <div class="form-group{{ $errors->has('brand') ? ' has-error' : '' }}">
                                <div class="col-md-4 control-label">
                                    {!! Form::label('brand','Marca') !!}
                                </div>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="fa fa-apple"></span>
                                        </div> 
                                        {!! Form::input('text','brand',null, 
                                                            ['class' => 'form-control']) 
                                        !!}
                                    </div>
                                    @if ($errors->has('brand'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('brand') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group{{ $errors->has('model') ? ' has-error' : '' }}">
                                <div class="col-md-4 control-label">
                                    {!! Form::label('model','Modelo') !!}
                                </div>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="fa fa-apple"></span>
                                        </div> 
                                        {!! Form::input('text','model',null, 
                                                            ['class' => 'form-control']) 
                                        !!}
                                    </div>
                                    @if ($errors->has('model'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('model') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-xs-12">
                            <div class="form-group{{ $errors->has('imei') ? ' has-error' : '' }}">
                                <div class="col-md-4 control-label">
                                    {!! Form::label('imei','Imei') !!}
                                </div>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="fa fa-apple"></span>
                                        </div> 
                                        {!! Form::input('text','imei',null, 
                                                            ['class' => 'form-control']) 
                                        !!}
                                    </div>
                                    @if ($errors->has('imei'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('imei') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-xs-12">
                            <div class="form-group{{ $errors->has('barcode') ? ' has-error' : '' }}">
                                <div class="col-md-4 control-label">
                                    {!! Form::label('barcode','Codigo barras') !!}
                                </div>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="fa fa-barcode"></span>
                                        </div> 
                                        {!! Form::input('text','barcode',null, 
                                                            ['class' => 'form-control']) 
                                        !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-xs-12">
                            <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                <div class="col-md-4 control-label">
                                    {!! Form::label('price','Precio pagado') !!}
                                </div>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="fa fa-money"></span>
                                        </div> 
                                        {!! Form::input('text','price',null, 
                                                            ['class' => 'form-control']) 
                                        !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-xs-12">
                            <div class="form-group">
                                <div class="col-md-2 control-label">
                                    {!! Form::label('coments','Observaciones')!!}               
                                </div>
                                <div class="col-md-10">
                                    {!! Form::textarea('coments',null,
                                                   ['class' => 'form-control',
                                                    'size'  => '60x3'])
                                    !!}
                                </div>
                            </div>
                        </div> 

                        <div class="col-md-12 col-xs-12 col-xs-offset-5">
                            <div class="form-group">	                                                                       
	                            <button type="submit" class="btn btn-primary" id="brand_btn">
	                                <i class="fa fa-btn fa-database"></i>Crea
	                            </button>
	                        </div>
	                    </div>
	                    {!! Form::close() !!}
	                </div><!-- fin panel-body -->
	            </div><!-- fin panel-default -->
            </div>
        </div>
    </div>
</div>
@endsection