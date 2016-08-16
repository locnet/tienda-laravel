@extends('master')
@section('insertar','class="active"')
@section('content')
<div class="container">
	<div class="row">
        <div class="col-md-8 col-md-offset-2 login">
        	<div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="roboto text-center white">
                        Añadir nuevo categoria
                    </h4>
                </div>
                <div class="panel-body">
                    {!! Form::open(['url' => '/brand/store',null,
                                    'class' => 'form-horizontal',
                                    'id' => 'create_form']) !!}
                    <div class="row">
                        <div class="col-md-8 col-xs-8">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            	<div class="col-md-4 control-label">
                            		{!! Form::label('name','Fabricante') !!}
                            	</div>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="fa fa-map-marker"></span>
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
                        <div class="col-md-4 col-xs-4">
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