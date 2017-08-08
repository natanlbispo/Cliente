@extends('layouts/principal')
@section('content')
@if (Auth::check() && Auth::user()->admin)
  <p>
  <h1> Cadastro Aluno </h1>
  <form action = "/student/added" method = "post">

    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

    <div class="form-group">
      <label>Nome</label>
      <input name="name" required="required" class="form-control"/>
    </div>

    <!-- div class="form-group">
      <label>Orientador </label>
      <input name="orientador" required="required" class="form-control"/>
    </div> -->

    <div class="form-group">
      <label>Matrícula</label>
      <input name="matricula" type="number" required="required" pattern="[0-9]+$" class="form-control"/>
    </div>

    <div class="form-group">
      <label>E-mail</label>
      <input name="email" type="email" required="required" class="form-control"/>
    </div>

    <div class="form-group">
      <label>CPF</label>
      <input name="cpf" type="number" required="required" pattern="[0-11]+$" class="form-control"/>
    </div>

    <div class="form-group">
      <label>Nota</label>
      <input name="nota" type="number" required="required" class="form-control"/>
    </div>

    <div class="form-group">
      <label>Semestre de Entrada</label>
      <input name="semestre_entrada" type="string" class="form-control"/>
    </div>

    <button type="submit">Enviar</button>

  </form>
@endif
@stop
