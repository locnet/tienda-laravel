@extends('master')
@section('content')
<div class="container">
	 <div class="row">
        <div class="panel panel-default login">
            <div class="panel-heading">
                <h4 class="roboto text-center blue">
                    Detalles producto
                </h4>
            </div>
            <div class="panel-body">
                {!! Form::open(['url' => '/vender/producto/'.$product['id']
                                         ,null,'class' => 'form-horizontal',
                                         ]) !!}
                {!! csrf_field() !!}
                <div class="row">
                    <table class="table">
                        <tr>
                            <td><p>Modelo: 
                                <span class="blue"> {{ $product['model'] }}</span>
                            </p></td>
                            <td>
                                <p>Barcode: <span class="blue">{{ $product['barcode'] }}</span>
                            </p></td>
                            <td><p>Imei: <span class="blue">{{ $product['imei'] }}</span></p></td>
                        </tr>
                        <tr>
                            <td><h3><strong>Precio: </strong>
                                <span class="blue">{{ $product['sell_price'] }} €</span>
                            </h3></td>
                        </tr>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-6 col-xs-8">
                        <div class="form-group">                   
                            <div class="col-md-5 control-label">
                                {!! Form::label('client','Selectiona un cliente') !!}
                            </div>                                
                            <div class="col-md-7">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <span class="fa fa-barcode"></span>
                                    </div> 
                                    {!! Form::select('client',
                                                      $client_array,
                                                      null, 
                                                      ['class' => 'form-control',
                                                      'id' => 'client']) 
                                    !!}                                
                                </div>                              
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-4" style="margin-top:10px">
                        <button type="button" class="btn btn-info" 
                                data-toggle="modal" data-target="#MyModal">
                                Cliente nuevo
                        </button>
                    </div>
                     <div class="col-md-3 col-xs-12">
                        <div class="form-group">                   
                            <div class="col-md-4 control-label">
                                {!! Form::label('invoice','Factura') !!}
                            </div>                                
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <span class="fa fa-barcode"></span>
                                    </div> 
                                    {!! Form::select('invoice',
                                                      array('true'  => 'Si',
                                                            'false' => 'No'),
                                                      null, 
                                                      ['class' => 'form-control']) 
                                    !!}                                
                                </div>                               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                   
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            <div class="col-md-2 control-label">
                                {!! Form::label('order_obs','Observaciones')!!}               
                            </div>
                            <div class="col-md-10">
                                {!! Form::textarea('coments',null,
                                               ['class' => 'form-control',
                                                'size'  => '60x3'])
                                !!}
                            </div>
                        </div>
                    </div>                    
                </div>
                <div class="row">
                    <div class="col-md-6 col-xs-6 col-xs-offset-5">  
                        <div class="form-group">                                                                     
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-shopping-cart"></i>Vender
                            </button>
                        </div>
                    </div>
                </div>                    
                {!! Form::close() !!}
            </div><!-- fin panel-body -->
        </div><!-- fin panel panel-default-->
    </div><!-- fin row -->
    @include('modals._new_client')
    
</div>
@endsection
@section('customjs')
<script src="{{ asset('datepicker/js/bootstrap-datepicker.js') }}"></script>
<script type="text/javascript">
    $('#MyModal').on('hide.bs.modal', function(e) {         
        var l = $('#client').find('option').length;
        $('#client').find("option[value="+l+"]").attr('selected',true);
        
            $.ajax({
                url: "{{ url('client/save') }}",
                type: "POST",
                data: $("modal-form").serialize(),
                headers: {'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')},
                success: function(data){
                    alert("Se ha creado el cliente.")
                },
                error: function(data){
                    alert('No se ha creado el cliente!');
                }
            });
    });
    
    $('#client').change(function(){
        
        var selectedClt = $('#client').val();
        var m = $('#update_client_modal');     

        //$('#UpdateClient').modal('show');

    });
</script>
@endsection
