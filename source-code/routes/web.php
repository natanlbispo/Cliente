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

Route::get('/remove/{id}', 'TesteController@remove');

//ROTAS DOS USUARIOS
Route::get('/lusuarios','TesteController@list_u');

Route::get('/cad_usuarios', 'TesteController@cad_u');

Route::post('/adiciona_u', 'TesteController@adiciona_u');

Route::get('/edit_u/{id}', 'TesteController@edit_u');

Route::post('/editadou/{id}', 'TesteController@editado_u');

Route::get('/removeu/{id}', 'TesteController@remove_u');

//ROTAS BOLSAS

Route::get('/lbolsas','TesteController@list_b');

Route::get('/cad_bolsas', 'TesteController@cad_b');

Route::post('/adiciona_b', 'TesteController@adiciona_b');

Route::get('/editb/{id}', 'TesteController@edit_b');

Route::post('/editadob/{id}', 'TesteController@editado_b');

Route::get('/removeb/{id}', 'TesteController@remove_b');
