@extends('layouts/principal')
@section('content')
@if (Auth::check() && Auth::user()->admin)
    <h2 class="sectionTitle">Cadastro de Área de Pesquisa</h2>
  <p>
  <section>
    <form class="form-horizontal teste" action="/bolsa/apq/register" action="/agencia/cadf/register" method="post">
      <h4>Todos os campos são obrigatórios</h4>
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
       <fieldset>
         <div class="control-group">
           <label class="control-label" for="nome">Área de Pesquisa:</label>
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
          <div class="panel-heading">Área de Pesquisa</div>
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Área</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Reuso de Software</td>
                  <td><a href="editaarea.html"><button type="button" class="btn btn-primary listButton">Editar Área</button></a></td>
                  <td><button type="button" class="btn btn-danger btn-primary listButton"  data-toggle="modal" data-target="#confirm">Deletar Área</button></td>
                  <div class="modal fade" id="confirm" role="dialog">
                  <div class="modal-dialog modal-md">
                      <div class="modal-content">
                        <div class="modal-body">
                          <p> Você realmente deseja Deletar esta Área de Pesquisa?</p>
                        </div>
                        <div class="modal-footer">
                          <a href="#" type="button" class="btn btn-danger" id="delete">Deletar Área</a>
                          <button type="button" data-dismiss="modal" class="btn btn-default">Cancelar</button>
                        </div>
                      </div>
                    </div>
                  </div>
                <tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Teste de Software</td>
                  <td><a href="editaarea.html"><button type="button" class="btn btn-primary listButton">Editar Área</button></a></td>
                  <td><button type="button" class="btn btn-danger btn-primary listButton"  data-toggle="modal" data-target="#confirm">Deletar Área</button></td>
                  <div class="modal fade" id="confirm" role="dialog">
                  <div class="modal-dialog modal-md">
                      <div class="modal-content">
                        <div class="modal-body">
                          <p> Você realmente deseja Deletar esta Área de Pesquisa?</p>
                        </div>
                        <div class="modal-footer">
                          <a href="#" type="button" class="btn btn-danger" id="delete">Deletar Área</a>
                          <button type="button" data-dismiss="modal" class="btn btn-default">Cancelar</button>
                        </div>
                      </div>
                    </div>
                  </div>
                <tr>
                 <tr>
                  <th scope="row">2</th>
                  <td>Qualidade de Software</td>
                  <td><a href="editaarea.html"><button type="button" class="btn btn-primary listButton">Editar Área</button></a></td>
                  <td><button type="button" class="btn btn-danger btn-primary listButton"  data-toggle="modal" data-target="#confirm">Deletar Área</button></td>
                  <div class="modal fade" id="confirm" role="dialog">
                  <div class="modal-dialog modal-md">
                      <div class="modal-content">
                        <div class="modal-body">
                          <p> Você realmente deseja Deletar esta Área de Pesquisa?</p>
                        </div>
                        <div class="modal-footer">
                          <a href="#" type="button" class="btn btn-danger" id="delete">Deletar Área</a>
                          <button type="button" data-dismiss="modal" class="btn btn-default">Cancelar</button>
                        </div>
                      </div>
                    </div>
                  </div>
                <tr>
            </table>

  </section>

  @endif
  @stop
