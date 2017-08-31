@extends('layouts.principal')
@section('content')
@if (Auth::check() && Auth::user()->admin)
  <p>
  <div class="table-responsive">
    <table ID= "alter" class=" table table-striped table-bordered table-hover">
      <tr>
        <th>Nome</th>
        <th>Matricula</th>
        <th>Email</th>
        @if ( Auth::user()->admin)
        <th></th>
        <th></th>
        @endif
        <th></th>
        </tr>
      <h1>Listagem de Avaliadores</h1>
      <?php foreach ($data as $r): ?>
      <tr>
        <td>{{$r->professor_name}}</td>
        <td><?= $r->users_professor_matricula ?> </td>
        <td><?= $r->professor_email ?> </td>
        <?php if (!$r->user_admin): ?>
          <td>
              <a href="{{action('AdminController@setAdmin', $r->user_id)}}"><button class="btn btn-primary btn-block listButton">Tornar Admin</button></a>
          </td>
        <?php endif; ?>
      <?php if ($r->user_admin): ?>
        <td>
              <a href="{{action('AdminController@notSetAdmin', $r->user_id)}}"><button class="btn btn-danger btn-primary btn-block listButton">Revogar Admin</button></a>
          </td>
         <?php endif; ?> 
        @if (Auth::user()->id != $r->user_id)
          <td>
              <a href="/admin/user/edit/<?= $r->user_id ?>"><button class="btn btn-primary btn-block listButton">Editar Admin</button></a>
          </td>
          <td>
              <a href="/admin/user/remove/<?= $r->user_id ?>"><button type="submit" class="btn btn-primary btn-danger btn-block">Remover</button></a>
          </td>
        @endif
        </tr>
      <?php endforeach ?>
    </table>
  </div>
  @endif
@stop