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

Route::get('/inicio/listarAreas', 'menuController@listarAreas')->name('listarAreas');
//Roles
Route::get('/menu','menuController@index')->name('menu');
Route::get('/roles','RoleController@index')->name('roles');
Route::get('/roles/crear','RoleController@crear')->name('crearRol');
Route::post('/roles/guardar','RoleController@guardar')->name('guardarRol');
Route::get('/roles/{role}/editar','RoleController@editar')->name('editarRol');
Route::put('/roles/{role}','RoleController@actualizar')->name('actualizarRol');
Route::delete('/roles/{role}/eliminar','RoleController@eliminar')->name('eliminarRol');

//usuarios
Route::get('/usuarios','usuarioController@index')->name('usuarios');
//<<<<<<< HEAD

//Areas
Route::get('area','AreaController@index')->name('areas');
Route::get('area/registrarArea','AreaController@registrar')->name('registrarArea');
Route::post('area/guardarArea','AreaController@registrar')->name('guardarArea');
//=======
Route::get('/usuarios/crear','usuarioController@crear')->name('crearUsuario');
Route::post('/usuarios/guardar','usuarioController@guardar')->name('guardarUsuario');
//>>>>>>> c8a3dbd378f54b057566cc0c63f538b61c250beb
//tutores
Route::get('profesionales','tutores@index')->name('profesionales');
Route::get('profesionales/registrotutor','tutores@registrar')->name('registrotutor');
Route::post('profesionales/listarTutor','tutores@listarTutor')->name('listarTutor');