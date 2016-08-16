@extends('master')
@section('stoc','class="active"')

@section('content')
<div class="container">
	<table class="table">
		<tr>
		    <td><p>Nombre:</p></td>
		    <td><p>{{ ucfirst($provider['name']. " ". $provider['surname']) }}
		</tr>
        <tr>
		    <td><p>Telefono:</p></td>
		    <td><p>{{ $provider['phone'] }}
		</tr>
		<tr>
		    <td><p>Tipo:</p></td>
		    <td><p>{{ ucfirst($provider['type']) }}
		</tr>
		<tr>
		    <td><p>CIF/NIF/DNI/NIE:</p></td>
		    <td><p>{{ strtoupper($provider['document']) }}
		</tr>
		<tr>
		    <td><p>Direccion:</p></td>
		    <td><p>{{ ucwords($provider['street']).", ".$provider['zipcode']." ".ucwords($provider['city']) }}
		</tr>
    </table>
</div>
@endsection