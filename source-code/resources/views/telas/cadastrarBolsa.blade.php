@extends('layouts/principal')
@section('content')
@if (Auth::check() && Auth::user()->admin)
  <p>
  <h2> Cadastro de Bolsas </h2>
  <form action = "/bolsa/added" method = "post">

    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

    <h4>Todos os campos são obrigatórios</h4>

    <div class="form-group">
      <label>Nome</label>
      <input name="nome" required="required" class="form-control"/>
    </div>

    <div class="form-group">
      <label>Agencia Fomentadora</label>
      <select name="fomentador" required="required" class="form-control">
        <?php foreach ($data['agencias'] as $agencia): ?>
          <option value="<?= $agencia->id ?>"> <?= $agencia->abv ?> </option>
        <?php endforeach ?>
      </select>
    </div>

    <div class="form-group">
      <label>Duração</label>
      <input name="duracao" type="number" required="required" class="form-control"/>
    </div>

    <button type="submit" class="btn btn-primary listButton">Enviar</button>

  </form>
@endif
@stop
