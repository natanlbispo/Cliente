@extends('layouts.principal')

@section('content')
@if (Auth::check() && Auth::user()->admin)
  <p>
  <h1>Atribuir Bolsa a  {{$data['student']->name}}</h1>

  <form action="/student/assigned/{{$data['student']->id}}" method="post">

    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

    <div class="form-group">
      <label>Bolsa</label>
      <select name="professor" required="required" class="form-control">
        <?php foreach ($data['projects'] as $project): ?>
          <option value="<?= $project->project_id ?>">
            <?= $project->project_name . " - " . $project->agencia_fomentadora_abv . " - " . $project->professor_name?> 
          </option>
        <?php endforeach ?>
      </select>
    </div>

    <div class="form-group">
      <label>Duração(meses)</label>
      <input name="duracao" type="number" pattern="[0-9]+$" class="form-control"/>
    </div>

    <button type="submit" class="btn btn-primary btn-block">Atribuir</button>
  </form>
    <br>
  <a href="/student/list"> <button class="btn btn-primary btn-block">Cancelar</button> </a>
@endif

@stop
