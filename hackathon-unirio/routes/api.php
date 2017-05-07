<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'cors'], function () {
  Route::group(['middleware' => 'jwt.auth'], function () {
      Route::resource('user', 'UserController');
      Route::resource('curso','CursoController');
      Route::resource('disciplina','DisciplinaController');
      Route::resource('monitoria','MonitoriaController');
      Route::post('/disciplina/{id}/teach', 'DisciplinaController@teach');
      Route::post('/disciplina/{id}/unteach', 'DisciplinaController@unteach');
  });

  Route::get('/igor', function () {
    return 'ola mundo';
  });
  Route::get('/login', 'AuthController@login');
});
