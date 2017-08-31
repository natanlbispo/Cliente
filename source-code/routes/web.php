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
  Route::get('/remove/{id}', 'StudentController@remove');
  Route::get('/revogar/{id}', 'StudentController@revogar');
});

// Bolsas
Route::prefix('bolsa')->group(function() {
  Route::get('/list','ProjectController@listAll');
  Route::get('/add', 'ProjectController@add');
  Route::post('/added', 'ProjectController@added');
  Route::get('/edit/{id}', 'ProjectController@edit');
  Route::post('/edited/{id}', 'ProjectController@edited');
  Route::get('/delete/{id}', 'ProjectController@delete');
  Route::get('/remove/{id}', 'ProjectController@remove');
  Route::get('/apq', 'AreapController@apq');
  Route::post('/apq/register', 'AreapController@apqr');
  Route::get('/calc', 'ProjectController@calc');
  Route::get('/calc/novo', 'ProjectController@calcn');

});

Route::get('/log', 'ProjectManagerController@log');
Route::post('/search', 'ProjectManagerController@logf');

// Agencia
Route::prefix('agencia')->group(function(){
  Route::get('/list', 'AgenciaController@listAll');
  Route::get('/add', 'AgenciaController@listAll');
  Route::get('/cadf', 'AgenciaController@cadf');
  Route::post('/cadf/register', 'AgenciaController@cadfr');
  Route::any('/delete/{id}', 'AgenciaController@delete');
});


Route::prefix('admin')->group(function() {
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
});

Route::prefix('admin/user')->group(function() {
  Route::get('/list','AdminController@listAll');
  Route::get('/admin/{id}','AdminController@setAdmin');
  Route::get('/notAdmin/{id}','AdminController@notSetAdmin');
  Route::get('/delete/{id}', 'AdminController@delete');
  Route::get('/remove/{id}', 'AdminController@remove');
  Route::get('/add', 'AdminController@add');
  Route::post('/added', 'AdminController@added');
  Route::get('/edit/{id}', 'AdminController@edit');
  Route::post('/edited/{id}', 'AdminController@edited');
});

Route::get('/phpinfo', 'AdminController@phpinfo');
