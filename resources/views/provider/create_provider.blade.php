@extends('master')
@section('insertar','class="active"')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1 login">
        	<div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="roboto text-center white">
                        Añadir nuevo provedor
                    </h4>
                </div>
                <div class="panel-body">
                    {!! Form::open(['url' => '/provider/store',null,
                                    'class' => 'form-horizontal',
                                    'id' => 'create_form']) !!}
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
                                        	{!! Form::input('text','name',null, 
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
                                    {!! Form::label('surname','Appelido') !!}
                                </div>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="fa fa-male"></span>
                                        </div> 
                                            {!! Form::input('text','surname',null, 
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
                            		{!! Form::label('document','CIF/NIF/NIE/DNI') !!}
                            	</div>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="fa fa-map-marker"></span>
                                        </div> 
                                        	{!! Form::input('text','document',null, 
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
                            		{!! Form::label('phone','Telefono') !!}
                            	</div>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="fa fa-phone"></span>
                                        </div> 
                                        	{!! Form::input('text','phone',null, 
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
                        	                    
                        <div class="col-md-6 col-xs-6">
                            <div class="form-group{{ $errors->has('street') ? ' has-error' : '' }}">
                                <div class="col-md-4 control-label">
                                    {!! Form::label('street','Calle') !!}
                                </div>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="fa fa-map-marker"></span>
                                        </div> 
                                        {!! Form::input('text','street',null, 
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

                        <div class="col-md-6 col-xs-6">
                            <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                                <div class="col-md-4 control-label">
                                    {!! Form::label('city','Ciudad') !!}
                                </div>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="fa fa-map-marker"></span>
                                        </div> 
                                        {!! Form::input('text','city',null, 
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
                        
                        <div class="col-md-6 col-xs-6">
                            <div class="form-group{{ $errors->has('zipcode') ? ' has-error' : '' }}">
                                <div class="col-md-4 control-label">
                                    {!! Form::label('zipcode','Codigo postal') !!}
                                </div>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="fa fa-map-marker"></span>
                                        </div> 
                                        {!! Form::input('text','zipcode',null, 
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

                        <div class="col-md-6 col-xs-6">
                            <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                                <div class="col-md-4 control-label">
                                    {!! Form::label('type','Tipo') !!}
                                </div>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="fa fa-apple"></span>
                                        </div> 
                                        {!! Form::select('type',
                                                          array('particular' =>  'particular',
                                                                'profesional' => 'profesional'),
                                                                 null, 
                                                          ['class' => 'form-control',
                                                              'id' =>'brand_id'
                                                          ]) 
                                        !!} 
                                    </div>
                                    @if ($errors->has('type'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('type') }}</strong>
                                        </span>
                                    @endif
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