@extends('layouts/principal')
@section('content')
  <p>
    @if(old("name"))
      <div class="alert alert-success">
        <strong>Sucesso!</strong>O aluno {{ old("nome") }} foi adicionado.</div>
    @endif
  <div class="table-responsive">
    <table ID= "alter" class=" tabbe table-striped table-bordered table-hover">
      <tr>
        <td>Nome    </td>
        <td>Matricula    </td>
        <td>Nota    </td>
        <!-- <td>Orientador   </td> -->
        <!-- <td>Bolsa   </td> -->
        </tr>
      <h1>Listagem de Alunos</h1>
      <?php foreach ($resposta as $r): ?>
      <tr>
        <td>{{$r->name}}</td>
        <td><?= $r->id ?> </td>
        <td><?= $r->normalized_grade ?> </td>
        @if (Auth::check() && Auth::user()->admin)
          <td> <a href="/student/edit/<?= $r->id ?>">Editar</a></td>
          <td><a href="{{action('StudentController@delete', $r->id)}}">Remover</a></td>
          <td><a href="{{action('StudentController@assign', $r->id)}}">Atribuir Bolsa</a></td>
          <td><a href="{{action('StudentController@revoke', $r->id)}}">Revogar Bolsa</a></td>
        @endif
        </tr>
      <?php endforeach ?>
    </table>
  </div>
@stop
