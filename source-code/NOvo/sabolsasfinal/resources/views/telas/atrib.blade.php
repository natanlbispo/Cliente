@extends('layouts.principal2')

@section('content')
<p>
<h1>Atribuir Bolsa a  {{$r->name}}</h1>

<form action="/atrba/{{$r->id}}" method="post">

  <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

    <div class="form-group">
      <label>Nome </label>
      <input name="name" required="requiored" class="form-control"/>
    </div>

  <div class="form-group">
    <label>Formentador </label>
    <input name="bolsa" required="requiored" class="form-control"/>
  </div>

  <div class="form-group">
    <label>Duração(meses) </label>
    <input name="duracao" type="number" required="requiored" pattern="[0-9]+$" class="form-control"/>
  </div>

  <button type="submit" class="btn btn-primary btn-block">Atribuir</button>
</form>
  <br>
<a href="/lalunos"> <button class="btn btn-primary btn-block">Cancelar</button> </a>

@stop
