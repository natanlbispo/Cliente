@extends('layouts/principal')
@section('content')
@if (Auth::check() && Auth::user()->admin)
    <h2 class="sectionTitle">Cadastro de Agência Fomentadora</h2>
    <p>
  <section>
    <form class="form-horizontal teste" action="/agencia/cadf/register" method="post">
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <h4>Todos os campos são obrigatórios</h4>
       <fieldset>
         <div class="control-group">
           <label class="control-label" for="nome">Nome da Agência:</label>
             <div class="controls">
               <input required="" id="nome" name="nome" type="text" class="inputStyle" placeholder="" class="input-medium" required="">
             </div>
         </div>
         <!-- Button -->
         <div class="control-group">
           <label class="control-label" for="signin"></label>
           <div class="controls">
             <button id="signin" name="signin" class="btn btn-primary navButton">Cadastrar</button>
           </div>
          </div>
         </fieldset>
       </form>
       <div class="panel panel-default">
          <div class="panel-heading">Agências Fomentadoras</div>
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nome da Agência</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($data as $r): ?>
                <tr>
                  <td>{{$r->abv}}</td>
                  <td><a href="editafomentador.html"><button type="button" class="btn btn-primary listButton">Editar Agência</button></a></td>
                  <td><button type="button" class="btn btn-danger btn-primary listButton"  data-toggle="modal" data-target="#confirm">Deletar Agência</button></td>
                  <div class="modal fade" id="confirm" role="dialog">
                    <div class="modal-dialog modal-md">
                      <div class="modal-content">
                        <div class="modal-body">
                        <div class="modal-body">
                        <p> Você realmente deseja Deletar esta agência?</p>
                        </div>
                        <div class="modal-footer">
                          <a href="/agencia/delete/<?= $r->id ?>" type="submit" class="btn btn-danger" id="delete">Deletar Agência</a>
                          <button type="button" data-dismiss="modal" class="btn btn-default">Cancelar</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </tr>
              <?php endforeach ?>
            </table>

  </section>
  @endif
  @stop
