    <div id="UpdateClient" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Cliente existente</h4>
                </div>
                <div class="modal-body">
                    {!! Form::open(['url' => 'client/save/',
                                    null,'class' => 'form-horizontal',
                                          'id' => 'update_client_modal',
                                    ]) 
                    !!}
                    {!! csrf_field() !!}
                    {!! Form::hidden('product_id',$product->id) !!}
                    {!! Form::hidden('client_id',1) !!}
                    <?php 
                        if ($clients->count() > 0){
                            $c = $clients->find(1);
                        }
                    ?>   
                    <div class="row">
                        <div class="col-md-6 col-xs-6">
                            <div class="form-group{{ $errors->has('client_name') ? ' has-error' : '' }}" >
                                <div class="col-md-4 control-label">
                                    {!! Form::label('client_name','Nombre') !!}
                                </div>
                                <div class="col-md-8">
                                     <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="fa fa-male"></span>
                                        </div> 
                                        {!! Form::input('text','client_name',$c->client_name, 
                                                         ['class' => 'form-control',
                                                         'id' => 'client_name'])
                                        !!} 
                                    </div>
                                </div>
                            </div>                          
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group{{ $errors->has('client_surname') ? ' has-error' : '' }}">
                                <div class="col-md-4 control-label">
                                    {!! Form::label('client_surname','Apellido') !!}
                                </div>                                
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="fa fa-male"></span>
                                        </div> 
                                        {!! Form::input('text','client_surname',null,
                                                       ['class' => 'form-control',
                                                        'id' => 'client_surname']) 
                                        !!}                                
                                    </div>                                  
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group{{ $errors->has('client_phone') ? ' has-error' : '' }}">
                                <div class="col-md-4 control-label">
                                    {!! Form::label('client_phone','Telefono') !!}
                                </div>

                                <div class="col-md-8">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="fa fa-phone"></span>
                                        </div> 
                                        {!! Form::input('text','client_phone',null,
                                                       ['class' => 'form-control',
                                                        'id' => 'client_pohone']) 
                                        !!}

                                    </div>
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
                                            <span class="fa fa-road"></span>
                                        </div> 
                                        {!! Form::input('text','street',null,
                                                       ['class' => 'form-control',
                                                        'id' => 'street']) 
                                        !!}                                
                                    </div>                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-6">
                            <div class="form-group{{ $errors->has('town') ? ' has-error' : '' }}">
                                <div class="col-md-4 control-label">
                                    {!! Form::label('town','Ciudad') !!}
                                </div>                                
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="fa fa-building"></span>
                                        </div> 
                                        {!! Form::input('text','town',null,
                                                       ['class' => 'form-control',
                                                        'id' => 'town']) 
                                        !!}                                
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-6">
                            <div class="form-group{{ $errors->has('postcode') ? ' has-error' : '' }}">                   
                                <div class="col-md-4 control-label">
                                    {!! Form::label('postcode','Codigo postal') !!}
                                </div>                                
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="fa fa-envelope"></span>
                                        </div> 
                                        {!! Form::input('text','postcode',null,
                                                       ['class' => 'form-control',
                                                        'id' => 'postcode']) 
                                        !!}                                
                                    </div>                               
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-6">
                            <div class="form-group{{ $errors->has('document') ? ' has-error' : '' }}">                   
                                <div class="col-md-4 control-label">
                                    {!! Form::label('document','Doc. identidad') !!}
                                </div>                                
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="fa fa-barcode"></span>
                                        </div> 
                                        {!! Form::input('text','document',null,
                                                       ['class' => 'form-control',
                                                        'id' => 'document']) 
                                        !!}                                
                                    </div>                               
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xs-6 col-xs-offset-5">  
                            <div class="form-group">                                                                     
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-close"></i>Aceptar
                                </button>
                            </div>
                        </div>
                    </div> 
                   
                    {!! Form::close() !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
