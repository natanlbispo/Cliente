<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return 'Teste SABolsas';
});

//ROTAS DOS ALUNOS
Route::get('/lalunos','TesteController@list_a');

Route::get('/cad_aluno', 'TesteController@cad_a');

Route::post('/adiciona_a', 'TesteController@adiciona_a');

Route::get('/edita/{id}', 'TesteController@edit_a');

Route::post('/editadoa/{id}', 'TesteController@editado_a');


//ROTAS DOS USUARIOS
Route::get('/lcord','TesteController@list_c');

Route::get('/editc', 'TesteController@edit_c');//fazer edição cordenadores


Route::get('/cad_usuario', 'TesteController@cad_u');
  Route::post('/adiciona_c', 'TesteController@adiciona_c');

Route::get('/remove/{id}', 'TesteController@remove');
