@extends('layouts.principal')

@section('content')
<p>
<h2>Confirma {{$r->nome}}</h2>

<form action="/tu/{{$r->id}}" method="post">

  <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

  <br>

	<button type="submit" class="btn btn-primary listButton">Registrar</button>
</form>
  <br>
@stop
