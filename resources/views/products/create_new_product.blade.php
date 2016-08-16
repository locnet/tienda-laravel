@extends('master')
@section('insertar','class="active"')
@section('content')
<div class="container">
    @if(!$message)
    <h3 class="text-center roboto blue">SI EL PRODUCTO EXISTE PUEDES COPIAR LOS DATOS</h3>
    <div class="row">
        <div class="col-md-8 col-md-offset-2 login">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="roboto text-center white">
                        Crear un nuevo producto
                    </h4>
                </div>
                <div class="panel-body">
                    {!! Form::open(['url' => '/product/create/entry',null,
                                    'class' => 'form-horizontal']) 
                    !!}
                    <div class="row">
                        <div class="col-md-8 col-xs-8">
                            <div class="form-group{{ $errors->has('model') ? ' has-error' : '' }}">
                                <div class="col-md-4 control-label">
                                    {!! Form::label('model','Modelo') !!}
                                </div>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="fa fa-map-marker"></span>
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
                        <div class="col-md-4 col-xs-4">
                            <div class="form-group">                                                                           
                                <button type="submit" class="btn btn-primary" id="brand_btn">
                                    <i class="fa fa-btn fa-search"></i>Busca
                                </button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div><!-- fin panel-body -->
                </div><!-- fin panel-default -->
            </div>
        </div>
    </div>
    @else
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="roboto text-center">
                    Crear nuevo producto
                </h4>
            </div>
            <div class="panel-body">
                {!! Form::open(['url' => '/product/store',null,'class' => 'form-horizontal',
                                'id' => 'create_form']) !!}
                {!! csrf_field() !!}
                <div class="row">
                    <div class="col-md-6 col-xs-6">
                        <div class="form-group{{ $errors->has('brand_id') ? ' has-error' : '' }}">
                        	<div class="col-md-4 control-label">
                        		{!! Form::label('brand','Fabricante') !!}
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
                    <div class="col-md-6 col-xs-6">
                        <div class="form-group{{ $errors->has('model') ? ' has-error' : '' }}" >
                        	<div class="col-md-4 control-label">
                        	    {!! Form::label('model','Model') !!}
                        	</div>
                            <div class="col-md-8">
                                 <div class="input-group">
                                    <div class="input-group-addon">
                                        <span class="fa fa-edit"></span>
                                    </div> 
                                	{!! Form::input('text','model',$model, 
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
                </div>
                <div class="row">
                    <!-- right side -->
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
                                                   ['class' => 'form-control'
                                                   ]) 
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
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group{{ $errors->has('imei') ? ' has-error' : '' }}">
                            <div class="col-md-4 control-label">
                                {!! Form::label('imei','Imei') !!}
                            </div>

                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <span class="fa fa-mobile"></span>
                                    </div> 
                                    {!! Form::input('text','imei',null,
                                                   ['class' => 'form-control'
                                                   ]) 
                                    !!}

                                </div>
                                @if ($errors->has('salida'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('imei') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>   
                <div class="row">
                    <div class="col-md-6 col-xs-6">
                        <div class="form-group{{ $errors->has('buy_price') ? ' has-error' : '' }}">
                            <div class="col-md-4 control-label">
                                {!! Form::label('buy_price','Precio compra') !!}
                            </div>                                
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <span class="fa fa-money"></span>
                                    </div> 
                                    {!! Form::input('text','buy_price',null,
                                                   ['class' => 'form-control'
                                                   ]) 
                                    !!}                                
                                </div>
                                @if ($errors->has('buy_price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('buy_price') }}</strong>
                                    </span>
                                @endif                                    
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-6">
                        <div class="form-group{{ $errors->has('buy_price') ? ' has-error' : '' }}">
                            <div class="col-md-4 control-label">
                                {!! Form::label('sell_price','Precio venta') !!}
                            </div>                                
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <span class="fa fa-money"></span>
                                    </div> 
                                    {!! Form::input('text','sell_price',null,
                                                   ['class' => 'form-control'
                                                   ]) 
                                    !!}                                
                                </div>
                                @if ($errors->has('sell_price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sell_price') }}</strong>
                                    </span>
                                @endif                                    
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">                   
                            <div class="col-md-4 control-label">
                                {!! Form::label('cpu','CPU') !!}
                            </div>                                
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <span class="fa fa-barcode"></span>
                                    </div> 
                                    {!! Form::input('text','cpu',null,
                                                   ['class' => 'form-control'
                                                   ]) 
                                    !!}                                
                                </div>                               
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">                   
                            <div class="col-md-4 control-label">
                                {!! Form::label('ram','RAM') !!}
                            </div>                                
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <span class="fa fa-barcode"></span>
                                    </div> 
                                    {!! Form::input('text','ram',null,
                                                   ['class' => 'form-control'
                                                   ]) 
                                    !!}                                
                                </div>                               
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">                   
                            <div class="col-md-4 control-label">
                                {!! Form::label('capacity','Almacenamiento') !!}
                            </div>                                
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <span class="fa fa-barcode"></span>
                                    </div> 
                                    {!! Form::input('text','capacity',null,
                                                   ['class' => 'form-control'
                                                   ]) 
                                    !!}                                
                                </div>                               
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">                   
                            <div class="col-md-4 control-label">
                                {!! Form::label('screen','Pantalla') !!}
                            </div>                                
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <span class="fa fa-barcode"></span>
                                    </div> 
                                    {!! Form::input('text','screen',null,
                                                   ['class' => 'form-control'
                                                   ]) 
                                    !!}                                
                                </div>                               
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">                   
                            <div class="col-md-4 control-label">
                                {!! Form::label('batery','Bateria') !!}
                            </div>                                
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <span class="fa fa-barcode"></span>
                                    </div> 
                                    {!! Form::input('text','batery',null,
                                                   ['class' => 'form-control']) 
                                    !!}                                
                                </div>                               
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">                   
                            <div class="col-md-4 control-label">
                                {!! Form::label('camera','Camara') !!}
                            </div>                                
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <span class="fa fa-barcode"></span>
                                    </div> 
                                    {!! Form::input('text','camera',null,
                                                   ['class' => 'form-control'
                                                   ]) 
                                    !!}                                
                                </div>                               
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">                   
                            <div class="col-md-4 control-label">
                                {!! Form::label('so','SO') !!}
                            </div>                                
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <span class="fa fa-barcode"></span>
                                    </div> 
                                    {!! Form::input('text','so',null,
                                                   ['class' => 'form-control'
                                                   ]) 
                                    !!}                                
                                </div>                               
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">                   
                            <div class="col-md-4 control-label">
                                {!! Form::label('tecnology','Tecnologia') !!}
                            </div>                                
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <span class="fa fa-barcode"></span>
                                    </div> 
                                    {!! Form::input('text','tecnology',null,
                                                   ['class' => 'form-control'
                                                   ]) 
                                    !!}                                
                                </div>                               
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-6">
                        <div class="form-group{{ $errors->has('id') ? ' has-error' : '' }}">
                            <div class="col-md-4 control-label">
                                {!! Form::label('provider_id','Provider') !!}
                            </div>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <span class="fa fa-apple"></span>
                                    </div>
                                    {!! Form::select('provider_id',
                                                      $provider,
                                                      null,
                                                      ['class' => 'form-control']) 
                                    !!} 
                                </div>
                                @if ($errors->has('provider_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-xs-6 col-xs-offset-5">  
                        <div class="form-group">                                                                     
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-database"></i>Crea
                            </button>
                        </div>
                    </div>
                </div>                    
                {!! Form::close() !!}
            </div><!-- fin panel-body -->
        </div><!-- fin panel panel-default-->
    </div><!-- fin row -->
    @endif
</div>
@endsection