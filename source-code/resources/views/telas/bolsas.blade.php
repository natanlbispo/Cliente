@extends('layouts/principal')
@section('content')
@if (Auth::check() && Auth::user()->admin)
  <p>
    @if(old("nome"))
      <div class="alert alert-success">
        <strong>Sucesso!</strong> A bolsa {{ old("nome") }} foi adicionado.</div>
    @endif
  <div class="table-responsive">
    <table ID= "alter" class=" table table-striped table-bordered table-hover">
      <tr>
        <th>Nome</th>
        <th>Duração</th>
        <th>Agência Fomentadora</th>
        <th></th>
        <th></th>
        </tr>
      <h1>Listagem de Bolsas</h1>
      <?php foreach ($resposta as $r): ?>
      <tr>
        <td> {{ $r->name}}</td>
        <td> {{ strftime("%d/%m/%y", $r->start_date) . " - " . strftime("%d/%m/%y", $r->end_date)}} </td>
        <td> {{ $r->abv}} </td>
        @if (Auth::check() && Auth::user()->admin)
          <td> <a href="/bolsa/edit/<?= $r->id ?>"><button type="button" class="btn btn-block btn-primary listButton">Editar</button></a></td>
          <td>
              <a href="/bolsa/remove/<?= $r->id ?>"><button type="submit" class="btn btn-block btn-primary btn-danger btn-block">Remover</button></a>
            </td>
        @endif
        </tr>
      <?php endforeach ?>
    </table>
  </div>
@endif
@stop
