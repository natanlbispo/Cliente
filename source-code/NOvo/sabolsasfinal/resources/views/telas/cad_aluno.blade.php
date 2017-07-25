@extends('layouts/principal2')
@section('content')
  <p>
  <h1> Cadastro Aluno </h1>
  <form action = "/adiciona_a" method = "post">

    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

    <div class="form-group">
      <label>Nome </label>
      <input name="name" required="requiored" class="form-control"/>
    </div>

    <div class="form-group">
      <label>Orientador </label>
      <input name="orientador" required="requiored" class="form-control"/>
    </div>


    <div class="form-group">
      <label>Matrícula </label>
      <input name="matricula" type="number" required="requiored" pattern="[0-9]+$" class="form-control"/>
    </div>

    <div class="form-group">
      <label>Email </label>
      <input name="email" type="email" required="requiored" class="form-control"/>
    </div>

    <div class="form-group">
      <label>CPF </label>
      <input name="cpf" type="number" required="requiored" pattern="[0-9]+$" class="form-control"/>
    </div>

    <div class="form-group">
      <label>Nota </label>
      <input name="nota"  type="number" required="requiored" class="form-control"/>
    </div>

    <div class="form-group">
      <label>Semestre Entrada </label>
      <input name="semestre_entrada" type="string" class="form-control"/>
    </div>

    <button type="submit">Enviar</button>

  </form>
@stop
