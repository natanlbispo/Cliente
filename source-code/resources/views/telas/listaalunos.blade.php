@extends('layout/principal')
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
        <td>Matricula    </td>
        <td>Nota    </td>
        <td>Orientador   </td>
        </tr>
      <h1>Listagem de Alunos</h1>
      <?php foreach ($resposta as $r): ?>
      <tr>
        <td>{{$r->nome}}</td>
        <td><?= $r->matricula ?> </td>
        <td><?= $r->nota ?> </td>
        <td><?= $r->orientador ?> </td>
        <td> <a href="/edita/<?= $r->id ?>">Editar</a></td>
        <td><a href="{{action('TesteController@remove', $r->id)}}"> Remover</a></td>
        </tr>
      <?php endforeach ?>
    </table>
  </div>
@stop
