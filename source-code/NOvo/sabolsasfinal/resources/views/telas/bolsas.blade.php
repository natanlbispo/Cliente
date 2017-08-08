@extends('layouts/principal')
@section('content')
@if (Auth::check() && Auth::user()->admin)
  <p>
    @if(old("nome"))
      <div class="alert alert-success">
        <strong>Sucesso!</strong> A bolsa {{ old("nome") }} foi adicionado.</div>
    @endif
  <div class="table-responsive">
    <table ID= "alter" class=" tabbe table-striped table-bordered table-hover">
      <tr>
        <td>Nome</td>
        <td>Duração</td>
        <td>Agência Fomentadora</td>
        </tr>
      <h1>Listagem de Bolsas</h1>
      <?php foreach ($resposta as $r): ?>
      <tr>
        <td> {{ $r->name}}</td>
        <td> {{ strftime("%d/%m/%y", $r->start_date) . " - " . strftime("%d/%m/%y", $r->end_date)}} </td>
        <td> {{ $r->abv}} </td>
        @if (Auth::check() && Auth::user()->admin)
          <td> <a href="/bolsa/edit/<?= $r->id ?>">Editar</a></td>
          <td><a href="{{action('AdminController@removeb', $r->id)}}"> Remover</a></td>
        @endif
        </tr>
      <?php endforeach ?>
    </table>
  </div>
@endif
@stop
