@extends('layouts/principal2')
@section('content')
  <p>
    @if(old("nome"))
      <div class="alert alert-success">
        <strong>Sucesso!</strong>O aluno {{ old("nome") }} foi adicionado.</div>
    @endif
  <div class="table-responsive">
    <table ID= "alter" class=" tabbe table-striped table-bordered table-hover">
      <tr>
        <td>Nome    </td>
        <td>Duração   </td>
        <td>Formentador   </td>
        </tr>
      <h1>Listagem de Bolsas</h1>
      <?php foreach ($resposta as $r): ?>
      <tr>
        <td> {{ $r->nome}}</td>
        <td> {{ $r->duracao}} </td>
        <td> {{ $r->formentador}} </td>
        <td> <a href="/editb/<?= $r->id ?>">Editar</a></td>
        <td><a href="{{action('AdminController@removeb', $r->id)}}"> Remover</a></td>
        </tr>
      <?php endforeach ?>
    </table>
  </div>
@stop
