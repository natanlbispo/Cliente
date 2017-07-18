@extends('layout/principal')
@section('content')
  <p>
  <div class="table-responsive">
    <table ID= "alter" class=" tabbe table-striped table-bordered table-hover">
      <tr>
        <td>Nome    </td>
        <td>Matricula    </td>
        <td>Nota    </td>
        <td>Orientador   </td>
        </tr>
      <h1>Listagem de Usuarios</h1>
      <?php foreach ($resposta as $r): ?>
      <tr>
        <td>{{$r->nome}}</td>
        <td><?= $r->matricula ?> </td>
        <td><?= $r->email ?> </td>
        <td> <a href="/edit_u/<?= $r->id ?>">Editar</a></td>
        <td><a href="{{action('TesteController@remove_u', $r->id)}}"> Remover</a></td>
        </tr>
      <?php endforeach ?>
    </table>
  </div>
@stop
