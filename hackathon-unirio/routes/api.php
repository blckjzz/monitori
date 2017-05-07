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
        Route::get('user/auth', 'UserController@showAuthUser');
        Route::get('user/auth/ofertadas','UserController@showDisciplinasOfertadas');
        Route::resource('user', 'UserController');
        Route::get('curso/{curso}/disciplinas','CursoController@showDisciplinasCurso');

        Route::resource('curso', 'CursoController');
        Route::resource('disciplina', 'DisciplinaController');
        Route::post('mentoria/solicitar','MonitoriaController@solicitarMonitoria');
        Route::get('mentoria/listar','MonitoriaController@showMonitorias');
        Route::resource('monitoria', 'MonitoriaController');
        Route::post('/disciplina/{id}/teach', 'DisciplinaController@teach');
        Route::post('/disciplina/{id}/unteach', 'DisciplinaController@unteach');
        Route::post('/disciplina/{id}/toggle', 'DisciplinaController@toggleTeach');
    });

    Route::post('/login', 'AuthController@login');
});
