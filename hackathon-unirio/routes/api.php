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

Route::group(['middleware' => 'jwt.auth'], function () {
    Route::resource('user', 'UserController');
    Route::resource('curso','CursoController');
    Route::resource('disciplina','DisciplinaController');
    Route::resource('monitoria','MonitoriaController');
    Route::post('/disciplina/x/teach', 'DisciplinaController@teach');
    Route::post('/disciplina/x/unteach', 'DisciplinaController@unteach');
});

Route::post('/login', 'AuthController@login');