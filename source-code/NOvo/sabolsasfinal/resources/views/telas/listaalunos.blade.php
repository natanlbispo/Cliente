@extends('layouts/principal2')
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
        <td>Orientador   </td>
        <td>Bolsa   </td>
        </tr>
      <h1>Listagem de Alunos</h1>
      <?php foreach ($resposta as $r): ?>
      <tr>
        <td>{{$r->name}}</td>
        <td><?= $r->matricula ?> </td>
        <td><?= $r->nota ?> </td>
        <td><?= $r->orientador ?> </td>
        <td><?= $r->bolsa ?> </td>
        <td> <a href="/edita/<?= $r->id ?>">Editar</a></td>
        <td><a href="{{action('AdminController@remove', $r->id)}}"> Remover</a></td>
        <td><a href="{{action('AdminController@atrb', $r->id)}}"> Atribuir Bolsa</a></td>
        <td><a href="{{action('AdminController@revolg', $r->id)}}"> Revolgar Bolsa</a></td>
        </tr>
      <?php endforeach ?>
    </table>
  </div>
@stop
