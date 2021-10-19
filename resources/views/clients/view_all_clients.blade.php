@extends('master')
@section('clients','class="active"')

@section('content')
<div class="container">
	<div class="col-md-12 col-xs-12">
       <h2 class="lato-100 text-center">Listado clientes</h2>
        @foreach($clients as $client)
            <p><a href="{{ url('view/client/'.$client->id) }}" >
                    {{ ucwords(strtolower($client->client_name." ".$client->client_surname)) }}
                </a>
            </p>
        @endforeach
    </div>
    
</div>
@endsection