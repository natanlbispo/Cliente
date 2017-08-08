@extends('layouts.principal')

@section('content')
<p>
<h1>Alterar usuario {{$r->nome}}</h1>

<form action="editadou/{{$r->id}}" method="post">

  <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

  <div class="form-group">
    <label>Nome </label>
    <input name="nome" required="requiored" class="form-control"/>
  </div>

  <div class="form-group">
    <label>Matrícula </label>
    <input name="matricula" type="number" required="requiored" pattern="[0-9]+$" class="form-control"/>
  </div>

  <div class="form-group">
    <label>Email </label>
    <input name="email" type="email" required="requiored" class="form-control"/>
  </div>

	<button type="submit" class="btn btn-primary btn-block">Registrar</button>
</form>
  <br>
<a href="/lusuarios "> <button class="btn btn-primary btn-block">Cancelar</button> </a>

@stop
