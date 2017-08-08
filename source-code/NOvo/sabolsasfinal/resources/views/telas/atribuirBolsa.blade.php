@extends('layouts.principal')

@section('content')
@if (Auth::check() && Auth::user()->admin)
  <p>
  <h1>Atribuir Bolsa a  {{$data->name}}</h1>

  <form action="/student/assigned/{{$data->id}}" method="post">

    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

      <div class="form-group">
        <label>Nome </label>
        <input name="name" class="form-control"/>
      </div>

    <div class="form-group">
      <label>Fomentador </label>
      <input name="bolsa" class="form-control"/>
    </div>

    <div class="form-group">
      <label>Duração(meses) </label>
      <input name="duracao" type="number" pattern="[0-9]+$" class="form-control"/>
    </div>

    <button type="submit" class="btn btn-primary btn-block">Atribuir</button>
  </form>
    <br>
  <a href="/student/list"> <button class="btn btn-primary btn-block">Cancelar</button> </a>
@endif

@stop
