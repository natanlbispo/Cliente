@extends('layouts/principal')
@section('content')
<!-- <meta name="csrf-token" content="{{ csrf_token() }}" />

<script type="text/javascript">
   $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
   });
</script> -->
  <div class="well well-large buscaCard">
    <form action="/search" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="control-group">
        <div class="controls">
          <label class="control-label labelSize" for="agenciaFomentadora">Agência Fomentadora:</label>

          <select id= "agencia" class="inputStyle" name= "agencia">
            <option value="">Selecione uma Agência</option>
            <?php foreach ($data['agencias'] as $agencia): ?>
              <option value="{{$agencia->id}}">{{$agencia->abv}}</option>
            <?php endforeach ?>
          </select>
          <label class="control-label labelSize pog" for="dataInicio">Data Início:</label>
          <input id="dataInicio" name="dataInicio" class="inputStyle row1" type="date" class="input-medium">
        </div>
        <div class="controls">
         <label class="control-label labelSize" for="dataInicio">Área de Pesquisa:</label>
            <select id = "area" name = "area" class="inputStyle row3">
             <option value="">Selecione uma Área</option>
              <?php foreach ($data['areas'] as $area): ?>
                <option value="{{$area->id}}">{{$agencia->nome}}</option>
              <?php endforeach ?>
            </select>
            <label class="control-label labelSize pog" for="dataFim">Data Fim:</label>
            <input id="dataFim" name="dataFim" class="inputStyle" type="date" class="input-medium">
        </div>
        <div class="controls">
          <div class="preRow3">
            <button type="submit">
              <span class="glyphicon glyphicon-search pog3"></span>
            </button>
          </div>
        </div>
      </div>
    </form>
    </div>
  <p>
    @if(old("name"))
      <div class="alert alert-success">
        <strong>Sucesso!</strong>O aluno {{ old("nome") }} foi adicionado.</div>
    @endif
  <div class="table-responsive">
    <table ID= "alter" class=" table table-striped table-bordered table-hover">
      <tr>
        <th>Nome da Bolsa   </th>
        <th>Aluno    </th>
        <th>Agencia Fomentadora    </th>
        <th>Área de Pesquisa    </th>
        <th>Data Inicio    </th>
        <th>Data Fim   </th>
        </tr>
      <?php foreach ($data['projects'] as $r): ?>
      <tr>
        <td>{{$r->project_name}}</td>
        <td><?= $r->student_name ?> </td>
        <td><?= $r->agencia_fomentadora_abv ?> </td>
        <td></td>
        <td><?= date("d/m/Y", $r->start_date)?></td>
        <td><?= date("d/m/Y", $r->end_date)?></td>
        </tr>
      <?php endforeach ?>
    </table>
  </div>
@stop
