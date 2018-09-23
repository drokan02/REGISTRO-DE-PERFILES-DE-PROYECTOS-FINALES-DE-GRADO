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
    return view('welcome');
})->name('inicio');

//Roles
Route::get('/menu','menuController@index')->name('menu');
Route::get('/roles','RoleController@index')->name('roles');
Route::get('/roles/crear','RoleController@crear')->name('crearRol');
Route::post('/roles/guardar','RoleController@guardar')->name('guardarRol');

//usuarios
Route::get('/usuarios','usuarioController@index')->name('usuarios');

//Areas

Route::get('areas','AreaController@index')->name('Areas');
Route::get('areas/registrarArea','AreaController@registrar')->name('registrarArea');
Route::post('areas/guardarArea','AreaController@registrar')->name('guardarArea');
Route::any('/areas/buscar', 'AreaController@index')->name('buscarArea');
Route::any('prueba','areaController@prueba')->name('prueba');
Route::any('prueba/ver','areaController@index')->name('prueba');
