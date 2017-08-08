@extends('layouts/principal')
@section('content')
@if (Auth::check() && Auth::user()->admin)
  <p>
  <h1> Cadastro Usuario </h1>
  <form action = "/admin/user/added" method = "post">

    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

    <div class="form-group">
      <label>Nome</label>
      <input name="name" required="required" class="form-control"/>
    </div>

    <div class="form-group">
      <label>E-mail</label>
      <input name="email" type="email" required="required" class="form-control"/>
    </div>

    <div class="form-group">
      <label>Matrícula</label>
      <input name="professor_matricula" type="number" required="required" pattern="[0-11]+$" class="form-control"/>
    </div>

    <div class="form-group">
      <label>Senha</label>
      <input id="password" type="password" class="form-control" name="password" required>
    </div>
    
    <div class="form-group">
      <label>Administrador</label><br>
      <input type="checkbox" name="admin">
    </div>

    <div class="form-group">
      <label>Acesso</label><br>
      <input type="checkbox" name="access">
    </div>

    <button type="submit">Enviar</button>

  </form>
@endif
@stop
