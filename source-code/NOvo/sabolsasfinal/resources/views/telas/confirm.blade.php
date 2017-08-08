@extends('layouts.principal')

@section('content')
<p>
<h1>Confirma {{$r->nome}}</h1>

<form action="/tu/{{$r->id}}" method="post">

  <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

  <br>

	<button type="submit" class="btn btn-primary btn-block">Registrar</button>
</form>
  <br>
@stop
