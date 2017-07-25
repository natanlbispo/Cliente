@extends('layouts.principal2')
@section('content')
  <p>
  <div class="table-responsive">
    <table ID= "alter" class=" tabbe table-striped table-bordered table-hover">
      <tr>
        <td>Nome    </td>
        <td>Matricula    </td>
        <td>Email    </td>
        </tr>
      <h1>Listagem de ADMINS</h1>
      <?php foreach ($resposta as $r): ?>
      <tr>
        <td>{{$r->nome}}</td>
        <td><?= $r->matricula ?> </td>
        <td><?= $r->email ?> </td>
        <td><a href="{{action('AdminController@tuser', $r->id)}}"> Tornar Usuário</a></td>
        </tr>
      <?php endforeach ?>
    </table>
  </div>
@stop
