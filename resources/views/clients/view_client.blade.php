@extends('master')
@section('clients','class="active"')

@section('content')
<div class="container">
	<div class="col-md-8 col-offset-md-4 col-xs-12">
        @if($message)
            {{ $message }}
        @endif
        <table class="table"> 
            <tr>
                <td><h4 class="blue">Nombre y apellidos:</h4></td>
                <td><h4>{{ ucwords($client->client_name." ".$client->client_surname) }}</h4></td>
            </tr>
            <tr>
                <td><h4 class="blue">Telefono:</h4></td>
                <td><h4>{{ $client->client_phone }}</h4></td>
            </tr>
            <tr>
                <td><h4 class="blue">Fecha nacimiento:</td>
                <td><h4>{{ $client->birthdate }}</td>
            </tr>
            <tr>
                <td><h4 class="blue">DNI/NIE:</td>
                <td><h4>{{ strtoupper($client->document) }}</td>
            </tr>
            <tr>
                <td><h4 class="blue">Direccion:</td>
                <td><h4>{{ ucwords($client->street).", ".$client->postcode.",".$client->town }}</td>
            </tr>
            <tr>
                <td><h4 class="blue">Fecha registro:</td>
                <td><h4>{{ $client->created_at }}</td>
            </tr>
            <tr>
                <td>
                    <h2>
                        <a href="{{ url('clientes') }}">
                            <button class="btn btn-primary">
                                <i class="fa fa-arrow-circle-left"></i>Volver
                            </button>
                        </a>
                    </h2>
                </td>
                <td>
                    <h2>                        
                        <button type="button" class="btn btn-info" 
                            data-toggle="modal" data-target="#UpdateClient">
                            <i class="fa fa-edit"></i>Editar
                        </button>                    
                    </h2>
                </td>
            </tr>
        </table>       
    </div>
    @include('modals._update_client')
    
</div>
@endsection
@section('customjs')
<script src="{{ asset('datepicker/js/bootstrap-datepicker.js') }}"></script>
<script type="text/javascript">
    $('#UpdateClient').on('hide.bs.modal', function(e) {         
        var l = $('#client').find('option').length;
        $('#client').find("option[value="+l+"]").attr('selected',true);
        
            $.ajax({
                url: "{{ url('client/'.$client->id.'/edit') }}",
                type: "POST",
                data: $("modal-form").serialize(),
                headers: {'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')},
                success: function(data){
                    alert("Successfully submitted.")
                },
                error: function(data){
                    alert('No se ha actualizado el cliente!');
                }
            });
    });
</script>
@endsection