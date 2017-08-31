@extends('layouts/principal')
@section('content')
@if (Auth::check() && Auth::user()->admin)

    <h2 class="sectionTitle">Cadastro de Cálculo de Padronização</h2>
<p>
  <section>
    <form class="form-horizontal teste" action="index.html">
      <h4>Todos os campos são obrigatórios</h4>
       <fieldset>
         <div class="control-group">
           <label class="control-label" for="nome">Nome da Regra:</label>
             <div class="controls">
               <input required="" id="nome" name="nome" type="text" class="inputStyle" placeholder="" class="input-medium" required="">
             </div>
         </div>
         <div class="control-group">
           <label class="control-label" for="calcRegra">Formula da Regra:</label>
             <div class="controls">
               <input required="" id="calcRegra" name="calcRegra" type="text" class="inputStyle" placeholder="" class="input-medium" required="">
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
          <div class="panel-heading">Cálculos de Padronização</div>
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nome da Regra</th>
                  <th>Formula da Regra</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>UFBA 2000</td>
                  <td>((Nota Média do Aluno)/Desvio Padrão))* 1,67 + 6</td>
                  <td><a href="editacalculo.html"><button type="button" class="btn btn-primary listButton">Editar Regra</button></a></td>
                  <td><button type="button" class="btn btn-danger btn-primary listButton" data-toggle="modal" data-target="#confirm">Deletar Regra</button></td>
                  <div class="modal fade" id="confirm" role="dialog">
                    <div class="modal-dialog modal-md">
                      <div class="modal-content">
                        <div class="modal-body">
                          <p> Você realmente deseja Deletar esta Regra?</p>
                        </div>
                        <div class="modal-footer">
                          <a href="#" type="button" class="btn btn-danger" id="delete">Deletar Regra</a>
                          <button type="button" data-dismiss="modal" class="btn btn-default">Cancelar</button>
                        </div>
                      </div>
                    </div>
                  </div>
                <tr>
                <tr>
                  <th scope="row">2</th>
                  <td>UFBA 2017</td>
                  <td>((Nota Média do Aluno)/Desvio Padrão))* 1,67 + 5</td>
                  <td><a href="editacalculo.html"><button type="button" class="btn btn-primary listButton">Editar Regra</button></a></td>
                  <td><button type="button" class="btn btn-danger btn-primary listButton" data-toggle="modal" data-target="#confirm" >Deletar Regra</button></td>
                  <div class="modal fade" id="confirm" role="dialog">
                    <div class="modal-dialog modal-md">
                      <div class="modal-content">
                        <div class="modal-body">
                          <p> Você realmente deseja Deletar esta Regra?</p>
                        </div>
                        <div class="modal-footer">
                          <a href="#" type="button" class="btn btn-danger" id="delete">Deletar Regra</a>
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
