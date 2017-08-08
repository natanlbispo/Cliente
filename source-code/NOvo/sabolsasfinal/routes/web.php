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
Auth::routes();
Route::get('/', function () {
    return view('index');
});

//Auth::routes();

Route::get('/home', 'HomeController@index');

Route::prefix('user')->group(function() {
  Route::get('/login', 'Auth\UserLoginController@showLoginForm')->name('user.login');
  Route::post('/login', 'Auth\UserLoginController@login')->name('user.login.submit');
  Route::get('/', 'UserController@index')->name('user.dashboard');
  Route::get('/logout', 'Auth\UserLoginController@logout')->name('user.logout');
});

// Alunos
Route::prefix('student')->group(function(){
  Route::get('/list','StudentController@listAll');
  Route::get('/add', 'StudentController@add');
  Route::post('/added', 'StudentController@added');
  Route::get('/edit/{id}', 'StudentController@edit');
  Route::post('/edited/{id}', 'StudentController@edited');
  Route::get('/delete/{id}', 'StudentController@delete');
  Route::get('/assign/{id}', 'StudentController@assign');
  Route::post('/assigned/{id}', 'StudentController@assigned');
  Route::get('/revoke/{id}', 'StudentController@revoke');
});




Route::prefix('admin')->group(function() {
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/luser','AdminController@list_u');
    Route::get('/cadmat','AdminController@cad_mat');
    Route::get('/ladmin','AdminController@list_a');
//Rota Bolsa
  Route::get('/lbolsa','AdminController@list_b')->name('cadaluno');
  Route::get('/cad_bolsa', 'AdminController@cad_b');

  });
  Route::get('/removeu/{id}', 'AdminController@removeu');
  Route::post('/adiciona_a', 'AdminController@adiciona_al');
  Route::post('/adiciona_m','AdminController@adiciona_m');
  Route::get('/tadmin/{id}', 'AdminController@tadmin');
  Route::get('/tuser/{id}', 'AdminController@tuser');
  Route::get('/atrb/{id}', 'AdminController@atrb');
  Route::post('/adiciona_b', 'AdminController@adiciona_b');
  Route::get('/removeb/{id}', 'AdminController@removeb');
  Route::get('/editb/{id}', 'AdminController@edit_b');
  Route::post('/editadob/{id}', 'AdminController@editado_b');
