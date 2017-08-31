@extends('layouts/principal')
@section('content')
@if (Auth::check() && Auth::user()->admin)
  <p>
  <h2> Cadastro de Alunos </h2>
  <form action = "/student/added" method = "post">

    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

    <h4>Todos os campos são obrigatórios</h4>

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
      <input name="matricula" type="text" required="required" pattern="[0-9]{9}" minlength="9" maxlength="9" class="form-control"/>
    </div>

    <div class="form-group">
      <label>E-mail</label>
      <input name="email" type="text" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" title="Invalid email address" required class="form-control"/>
    </div>

    <div class="form-group">
      <label>CPF</label>
      <input name="cpf" type="text" required="required" pattern="[0-9]{11}" minlength="11" maxlength="11" class="form-control"/>
    </div>

    <div class="form-group">
      <label>Nota</label>
      <input name="nota" type="number" required="required" class="form-control" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" title="Este deve ser um número com 2 casas decimais" min="0" max="10"/>
    </div>

    <div class="form-group">
      <label>Semestre de Entrada</label>
      <input name="semestre_entrada" type="text" pattern="[0-9]{5}" minlength="5" maxlength="5" class="form-control" required />
    </div>

    <button type="submit" class="btn btn-primary listButton">Enviar</button>

  </form>
@endif
@stop
