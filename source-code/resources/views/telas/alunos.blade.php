@extends('layouts/principal')
@section('content')
  <p>
    @if(old("name"))
      <div class="alert alert-success">
        <strong>Sucesso!</strong>O aluno {{ old("nome") }} foi adicionado.</div>
    @endif
  <div class="table-responsive">
    <table ID= "alter" class=" table table-striped table-bordered table-hover">
      <tr>
        <th>Nome</th>
        <th>Matricula</th>
        <th>Nota</th>
        <th>Bolsa</th>
         @if (Auth::check() && Auth::user()->admin)
        <th></th>
        <th></th>
        <th></th>
        <th></th>
         @endif
        <!-- <td>Orientador   </td> -->
        </tr>
      <h1>Listagem de Alunos</h1>
      <?php foreach ($resposta as $r): ?>
        <tr>
          <td>{{$r->name}}</td>
          <td><?= $r->id ?> </td>
          <td><?= $r->normalized_grade ?> </td>
          <td><?= $r->project_name ?> </td>
          @if (Auth::check() && Auth::user()->admin)
            <td>
              <a href="/student/edit/<?= $r->id ?>"><button type="submit" class="btn btn-primary btn-block">Editar</button></a>
            </td>
            <td>
              <a href="/student/remove/<?= $r->id ?>"><button type="submit" class="btn btn-primary btn-danger btn-block">Remover</button></a>
            </td>
            <td><a href="/student/assign/<?= $r->id ?>"><button type="submit" class="btn btn-primary btn-block listButton">Atribuir Bolsa</button></a></td>
            <td><a href="/student/revogar/<?= $r->id ?>"><button type="submit" class="btn btn-primary btn-danger btn-block">Revogar Bolsa</button></a></td>
          @endif
          </tr>
      <?php endforeach ?>
    </table>
  </div>
@stop
