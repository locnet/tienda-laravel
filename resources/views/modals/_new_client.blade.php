<!-- Modal -->
    <div id="MyModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

        <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    {!! Form::open(['url' => 'client/save/',
                                    null,'class' => 'form-horizontal',
                                    'id' => 'modal-form',
                                    ]) 
                    !!}
                    {!! csrf_field() !!}
                    {!! Form::hidden('product_id',$product->id) !!}
                    <div class="row">
                        <div class="col-md-6 col-xs-6">
                            <div class="form-group{{ $errors->has('client_name') ? ' has-error' : '' }}" >
                                <div class="col-md-12">
                                     <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="fa fa-male"></span>
                                        </div> 
                                        {!! Form::input('text','client_name',null, 
                                                         ['class' => 'form-control',
                                                         'placeholder' => 'Nombre'])
                                        !!} 
                                    </div>
                                </div>
                            </div>                          
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group{{ $errors->has('client_surname') ? ' has-error' : '' }}">                            
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="fa fa-male"></span>
                                        </div> 
                                        {!! Form::input('text','client_surname',null,
                                                       ['class' => 'form-control',
                                                       'placeholder' => 'Appelido'
                                                       ]) 
                                        !!}                                
                                    </div>                                  
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group{{ $errors->has('client_phone') ? ' has-error' : '' }}">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="fa fa-phone"></span>
                                        </div> 
                                        {!! Form::input('text','client_phone',null,
                                                       ['class' => 'form-control',
                                                       'placeholder' => 'Telefono'
                                                       ]) 
                                        !!}

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-6">
                            <div class="form-group{{ $errors->has('street') ? ' has-error' : '' }}">                               
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="fa fa-road"></span>
                                        </div> 
                                        {!! Form::input('text','street',null,
                                                       ['class' => 'form-control',
                                                       'placeholder' => 'Calle'
                                                       ]) 
                                        !!}                                
                                    </div>                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-6">
                            <div class="form-group{{ $errors->has('town') ? ' has-error' : '' }}">                               
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="fa fa-building"></span>
                                        </div> 
                                        {!! Form::input('text','town',null,
                                                       ['class' => 'form-control',
                                                       'placeholder' => 'Ciudad'
                                                       ]) 
                                        !!}                                
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-6">
                            <div class="form-group{{ $errors->has('postcode') ? ' has-error' : '' }}">                                                                                 
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="fa fa-envelope"></span>
                                        </div> 
                                        {!! Form::input('text','postcode',null,
                                                       ['class' => 'form-control',
                                                       'placeholder' => 'Codigo postal'
                                                       ]) 
                                        !!}                                
                                    </div>                               
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-6">
                            <div class="form-group{{ $errors->has('document') ? ' has-error' : '' }}">                          
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="fa fa-barcode"></span>
                                        </div> 
                                        {!! Form::input('text','document',null,
                                                       ['class' => 'form-control',
                                                       'placeholder' => 'Doc. identidad'
                                                       ]) 
                                        !!}                                
                                    </div>                               
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-6">
                            <div class="form-group{{ $errors->has('birthdate') ? ' has-error' : '' }}">                   
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="fa fa-calendar"></span>
                                        </div> 
                                        {!! Form::input('text','birthdate',null,
                                                       ['class' => 'form-control',
                                                       'placeholder' => 'Nacimiento ex: 1990-12-01',
                                                       'id' => 'birthdate'
                                                       ]) 
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
                                    <i class="fa fa-btn fa-shopping-cart"></i>Guardar
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
