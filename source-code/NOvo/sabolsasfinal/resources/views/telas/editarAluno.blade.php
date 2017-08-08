@extends('layouts.principal')

@section('content')
@if (Auth::check() && Auth::user()->admin)
  <p>
  <h1>Alterar aluno </h1>

  <form action="/student/edited/<?= $data->id ?>" method="post">

    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

    <div class="form-group">
      <label>Nome </label>
      <input name="nome" required="required" class="form-control" value="<?= $data->name ?>"/>
    </div>

    <div class="form-group">
      <label>Matrícula </label>
      <input name="matricula" type="number" required="required" pattern="[0-9]+$" class="form-control" value="<?= $data->id ?>"/>
    </div>

    <div class="form-group">
      <label>Nota </label>
      <input name="nota" type="number" required="required" class="form-control" value="<?= $data->grade ?>"/>
    </div>

    <div class="form-group">
      <label>Data de Entrada </label>
      <input name="data" class="form-control" value="<?= $data->enrollment_date ?>"/>
    </div>

    <!-- <div class="form-group">
      <label>Orientador</label>
      <input name="orientador" required="requiored" class="form-control"/>
    </div> -->
  	<button type="submit" class="btn btn-primary btn-block">Registrar</button>
  </form>
    <br>
  <a href="/lbolsas "> <button class="btn btn-primary btn-block">Cancelar</button> </a>
@endif

@stop
