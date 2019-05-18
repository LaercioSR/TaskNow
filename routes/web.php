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
    return redirect()->route('tarefa.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/tarefa/concluidas', 'TarefaController@tarefasConcluidas');
Route::resource('tipotarefa', 'TipoTarefaController');
Route::resource('usuario', 'UserController');
Route::resource('tarefa', 'TarefaController');
Route::get('/tarefa/{tarefa}/concluir', 'TarefaController@concluir');
