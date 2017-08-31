@extends('layouts.principal')

@section('content')
@if (Auth::check() && Auth::user()->admin)
  <p>
  <h2>Alterar Bolsa  {{$data['project']->project_name}}</h2>
  <form action = "/bolsa/edited/{{$data['project']->project_id}}" method = "post">

    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

    <div class="form-group">
      <label>Nome</label>
      <input name="nome" required="required" class="form-control" value="{{$data['project']->project_name}}"/>
    </div>

    <div class="form-group">
      <label>Agencia Fomentadora</label>
      <select name="fomentador" required="required" class="form-control">
        <?php foreach ($data['agencias'] as $agencia): ?>
          <option <?php if ($agencia->id == $data['project']->agencia_fomentadora_id): ?> selected <?php endif; ?>
            value="<?= $agencia->id ?>"> <?= $agencia->abv ?> </option>
        <?php endforeach ?>
      </select>
    </div>

    <!-- <div class="form-group">
      <label>Duração</label>
      <input name="duracao" type="number" required="required" class="form-control"/>
    </div> -->

    <button type="submit" class="btn btn-primary listButton">Enviar</button>

  </form>
@endif
@stop
