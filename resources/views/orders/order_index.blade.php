@extends('master')
@section('vender','class="active"')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-xs-12 login">
        	<div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="lato-100 text-center white">
                        VENTA DE MOVILES
                    </h3>
                </div>
                <div class="col-md-12 col-xs-12">
                    <h4 class="lato-200">Busqueda por el modelo</h4>
                </div>
                <div class="panel-body">
                    {!! Form::open(['url' => '/buscar/producto/modelo',null,
                                    'class' => 'form-horizontal']) 
                                    !!}
                    <div class="row">
                        <div class="col-md-5 col-xs-12">
                            <div class="form-group{{ $errors->has('brand_id') ? ' has-error' : '' }}">
                            	<div class="col-md-4 control-label">
                            		{!! Form::label('brand_id','Marca') !!}
                            	</div>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="fa fa-apple"></span>
                                        </div> 
                                    	{!! Form::select('brand_id',
                                                  $brand,
                                                  null, 
                                                  ['class' => 'form-control',
                                                      'id' =>'brand_id'
                                                  ]) 
                                        !!}  
                                    </div>
                                    @if ($errors->has('brand_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('brand_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-xs-8">
                            <div class="form-group{{ $errors->has('model') ? ' has-error' : '' }}">
                            	<div class="col-md-4 control-label">
                            		{!! Form::label('modelo','Modelo') !!}
                            	</div>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="fa fa-barcode"></span>
                                        </div> 
                                        	{!! Form::input('text','model',null, 
                                                           ['class' => 'form-control']) 
                                            !!} 
                                    </div>
                                    @if ($errors->has('brand'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('model') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-xs-4">
                            <div class="form-group">	                                                                       
	                            <button type="submit" class="btn btn-primary" id="brand_btn">
	                                <i class="fa fa-search"></i>Busca
	                            </button>
	                        </div>
	                    </div>
	                    {!! Form::close() !!}
	                </div><!-- fin row -->
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <h4 class="lato-200">Busqueda por el codigo de barras</h4>
                        </div>                        
                        {!! Form::open(['url' => '/buscar/producto/barcode',null,
                                    'class' => 'form-horizontal']) 
                                    !!}
                        <div class="col-md-5 col-xs-8">
                            <div class="form-group{{ $errors->has('barcode') ? ' has-error' : '' }}">
                                <div class="col-md-4 control-label">
                                    {!! Form::label('barcode','Barcode') !!}
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
                                    @if ($errors->has('barcode'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('barcode') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-xs-4">
                            <div class="form-group">                                                                           
                                <button type="submit" class="btn btn-primary" id="brand_btn">
                                    <i class="fa fa-search"></i>Busca
                                </button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div><!-- fin row -->
	            </div><!-- fin panel-body -->
            </div><!-- fin panel-primary -->
        </div>
    </div>
</div>
@endsection