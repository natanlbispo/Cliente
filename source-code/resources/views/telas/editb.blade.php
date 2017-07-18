@extends('layout.principal')

@section('content')
<p>
<h1>Alterar Bolsa  {{$r->nome}}</h1>

<form action="editadob/{{$r->id}}" method="post">

  <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

  <div class="form-group">
    <label>Nome </label>
    <input name="nome" required="requiored" class="form-control"/>
  </div>

  <div class="form-group">
    <label>Duração </label>
    <input name="duracao" required="requiored" class="form-control"/>
  </div>

	<button type="submit" class="btn btn-primary btn-block">Registrar</button>
</form>
  <br>
<a href="/lalunos "> <button class="btn btn-primary btn-block">Cancelar</button> </a>

@stop
