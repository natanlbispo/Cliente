@extends('layouts.principal')

@section('content')
@if (Auth::check() && Auth::user()->admin)
  <p>
  <h2>Alterar Aluno </h2>

  <form action="/student/edited/<?= $data->id ?>" method="post">

    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

    <div class="form-group">
      <label>Nome </label>
      <input name="nome" required="required" class="form-control" value="<?= $data->name ?>"/>
    </div>

    <div class="form-group">
      <label>Matrícula </label>
      <input name="matricula" type="text" required="required" pattern="[0-9]{9}" minlength="9" maxlength="9" class="form-control" value="<?= $data->id ?>"/>
    </div>

    <div class="form-group">
      <label>Nota </label>
      <input name="nota" type="number" required="required" class="form-control" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" title="Este deve ser um número com 2 casas decimais" min="0" max="10" value="<?= $data->grade ?>"/>
    </div>

    <div class="form-group">
      <label>Semestre de Entrada</label>
      <input name="semestre_entrada" type="text" pattern="[0-9]{5}" minlength="5" maxlength="5" class="form-control" required value="<?= $data->enrollment_date ?>"/>
    </div>
    <!-- <div class="form-group">
      <label>Orientador</label>
      <input name="orientador" required="requiored" class="form-control"/>
    </div> -->
  	<button type="submit" class="btn btn-primary listButton">Registrar</button>
  </form>
    <br>
  <a href="/student/list "> <button class="btn btn-primary btn-block">Cancelar</button> </a>
@endif

@stop
