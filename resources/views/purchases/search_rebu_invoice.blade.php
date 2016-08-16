@extends('master')
@section('comprar','class="active"')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 login">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="roboto text-center white">
                        Buscar factura compra telefono de particular (REBU)
                    </h4>
                </div>
                <div class="panel-body">
                    {!! Form::open(['url' => '/buscar/factura-rebu',null,
                                    'class' => 'form-horizontal']) 
                    !!}
                    <div class="row">
                        <div class="col-md-8 col-xs-8">
                            <div class="form-group{{ $errors->has('imei') ? ' has-error' : '' }}">
                                <div class="col-md-4 control-label">
                                    {!! Form::label('imei','Imei telefono:') !!}
                                </div>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="fa fa-barcode"></span>
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
                        <div class="col-md-4 col-xs-4">
                            <div class="form-group">                                                                           
                                <button type="submit" class="btn btn-primary" id="brand_btn">
                                    <i class="fa fa-btn fa-search"></i>Busca factura
                                </button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div><!-- fin panel-body -->
                </div><!-- fin panel-default -->
            </div>
        </div>
    </div>

</div><!-- fin container-->
@endsection