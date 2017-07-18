@extends('layout/principal')
@section('content')
  <p>
  <h1> Cadastro Bolsa </h1>
  <form action = "/adiciona_b" method = "post">

    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

    <div class="form-group">
      <label>Nome </label>
      <input name="nome" required="requiored" class="form-control"/>
    </div>


    <div class="form-group">
      <label>Duração </label>
      <input name="duracao" type="number" required="requiored" class="form-control"/>
    </div>

    <button type="submit">Enviar</button>

  </form>
@stop
