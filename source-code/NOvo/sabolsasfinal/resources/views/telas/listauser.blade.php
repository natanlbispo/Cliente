@extends('layouts.principal')
@section('content')
  <p>
  <div class="table-responsive">
    <table ID= "alter" class=" tabbe table-striped table-bordered table-hover">
      <tr>
        <td> Nome    </td>
        <td> Email    </td>
        <td> Matricula    </td>
        </tr>
      <h1>Listagem de Usuarios</h1>
      <?php foreach ($resposta as $r): ?>
      <tr>
        <td>{{$r->nome}}</td>
        <td><?= $r->matricula ?> </td>
        <td><?= $r->email ?> </td>
        <td></td>
        <td><a href="{{action('AdminController@tadmin', $r->id)}}"> Tadmin</a></td>
        <td><a href="{{action('AdminController@removeu', $r->id)}}"> Remover</a></td>
        </tr>
      <?php endforeach ?>
    </table>
  </div>
@stop
