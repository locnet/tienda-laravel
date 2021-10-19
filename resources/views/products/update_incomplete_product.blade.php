@extends('master')
@section('insertar','class="active"')
@section('content')
<div class="container">
	
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="roboto text-center">
                    Crear nuevo producto
                </h4>
            </div>
            <div class="panel-body">
                {!! Form::open(['url' => '/product/update',null,'class' => 'form-horizontal',
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
                                	{!! Form::input('text','brand',$brand['name'], 
                                                     ['class' => 'form-control'])
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
                                	{!! Form::input('text','model',$product['model'], 
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
                                    {!! Form::input('text','barcode',$product->barcode,
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
                                    {!! Form::input('text','imei',$product->imei,
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
                                    {!! Form::input('text','buy_price',$product['buy_price'],
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
                        <div class="form-group{{ $errors->has('sell_price') ? ' has-error' : '' }}">
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
                    <div class="col-md-6 col-xs-6">
                        <div class="form-group{{ $errors->has('cpu') ? ' has-error' : '' }}">                  
                            <div class="col-md-4 control-label">
                                {!! Form::label('cpu','CPU') !!}
                            </div>                                
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <span class="fa fa-barcode"></span>
                                    </div> 
                                    {!! Form::input('text','cpu',$details['cpu'],
                                                   ['class' => 'form-control']) 
                                    !!}                                
                                </div> 
                                @if ($errors->has('cpu'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cpu') }}</strong>
                                    </span>
                                @endif                               
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-6">
                        <div class="form-group {{ $errors->has('ram') ? ' has-error' : '' }}">                   
                            <div class="col-md-4 control-label">
                                {!! Form::label('ram','RAM') !!}
                            </div>                                
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <span class="fa fa-barcode"></span>
                                    </div> 
                                    {!! Form::input('text','ram',$details['ram'],
                                                   ['class' => 'form-control'
                                                   ]) 
                                    !!}                                
                                </div>
                                @if ($errors->has('ram'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ram') }}</strong>
                                    </span>
                                @endif                              
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group{{ $errors->has('ram') ? ' has-error' : '' }}">                 
                            <div class="col-md-4 control-label">
                                {!! Form::label('capacity','Almacenamiento') !!}
                            </div>                                
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <span class="fa fa-barcode"></span>
                                    </div> 
                                    {!! Form::input('text','capacity',$details['capacity'],
                                                   ['class' => 'form-control'
                                                   ]) 
                                    !!}                                
                                </div>
                                @if ($errors->has('capacity'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('capacity') }}</strong>
                                    </span>
                                @endif                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group{{ $errors->has('screen') ? ' has-error' : '' }}">                   
                            <div class="col-md-4 control-label">
                                {!! Form::label('screen','Pantalla') !!}
                            </div>                                
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <span class="fa fa-barcode"></span>
                                    </div> 
                                    {!! Form::input('text','screen',$details['screen'],
                                                   ['class' => 'form-control'
                                                   ]) 
                                    !!}                                
                                </div>
                                 @if ($errors->has('screen'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('screen') }}</strong>
                                    </span>
                                @endif                              
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group{{ $errors->has('batery') ? ' has-error' : '' }}">                   
                            <div class="col-md-4 control-label">
                                {!! Form::label('batery','Bateria') !!}
                            </div>                                
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <span class="fa fa-barcode"></span>
                                    </div> 
                                    {!! Form::input('text','batery',$details['batery'],
                                                   ['class' => 'form-control'
                                                   ]) 
                                    !!}                                
                                </div>
                                @if ($errors->has('batery'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('batery') }}</strong>
                                    </span>
                                @endif                               
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
                                    {!! Form::input('text','camera',$details['camera'],
                                                   ['class' => 'form-control'
                                                   ]) 
                                    !!}                                
                                </div>
                                 @if ($errors->has('camera'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('camera') }}</strong>
                                    </span>
                                @endif                              
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
                                    {!! Form::input('text','so',$details['so'],
                                                   ['class' => 'form-control'
                                                   ]) 
                                    !!}                                
                                </div>
                                 @if ($errors->has('so'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('so') }}</strong>
                                    </span>
                                @endif                              
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
                                    {!! Form::input('text','tecnology',$details['tecnology'],
                                                   ['class' => 'form-control'
                                                   ]) 
                                    !!}                                
                                </div>
                                 @if ($errors->has('tecnology'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tecnology') }}</strong>
                                    </span>
                                @endif                             
                            </div>
                        </div>
                    </div>
                    
                    {!! Form::hidden('provider_id',$provider['id'])!!}
                    
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
</div>
@endsection