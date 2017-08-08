@extends('layouts.principal')
@section('content')
@if (Auth::check() && Auth::user()->admin)
  <p>
  <div class="table-responsive">
    <table ID= "alter" class=" tabbe table-striped table-bordered table-hover">
      <tr>
        <td>Nome</td>
        <td>Email</td>
        <td>Matricula</td>
        </tr>
      <h1>Listagem de Usuarios</h1>
      <?php foreach ($data as $r): ?>
      <tr>
        <td>{{$r->professor_name}}</td>
        <td><?= $r->users_professor_matricula ?> </td>
        <td><?= $r->professor_email ?> </td>
        <td></td>
        <?php if (!$r->user_admin): ?>
          <td>
              <a href="{{action('AdminController@setAdmin', $r->user_id)}}">Tornar Adm</a>
          </td>
        <?php endif; ?>
        @if (Auth::user()->id != $r->user_id)
          <td>
              <a href="{{action('AdminController@delete', $r->user_id)}}"> Remover</a>
          </td>
        @endif
        </tr>
      <?php endforeach ?>
    </table>
  </div>
  @endif
@stop
