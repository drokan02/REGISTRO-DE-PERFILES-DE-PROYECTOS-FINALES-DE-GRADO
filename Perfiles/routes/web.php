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
Route::get('/roles/{role}/editar','RoleController@editar')->name('editarRol');
Route::put('/roles/{role}','RoleController@actualizar')->name('actualizarRol');
Route::delete('/roles/{role}/eliminar','RoleController@eliminar')->name('eliminarRol');

//usuarios
Route::get('/usuarios','usuarioController@index')->name('usuarios');
Route::get('/usuarios/crear','usuarioController@crear')->name('crearUsuario');
Route::post('/usuarios/guardar','usuarioController@guardar')->name('guardarUsuario');
Route::get('/usuarios/{user}','usuarioController@detalle')->name('detalleUsuario');
Route::get('/usuarios/{user}/editar','usuarioController@editar')->name('editarUsuario');
Route::put('/usuarios/{user}','usuarioController@actualizar')->name('actualizarUsuario');//put metodo para actualizar
Route::delete('/usuarios/{user}/eliminar','usuarioController@eliminar')->name('eliminarUsuario');

//Areas
Route::get('/areas','AreaController@index')->name('Areas');
Route::get('/areas/registrar','AreaController@registrar')->name('registrarArea');
Route::post('/areas/registrar/almacenar','AreaController@almacenar')->name('almacenarArea');
Route::post('/areas/editar','AreaController@editar')->name('editarArea');
Route::post('/areas/editar/modificar','AreaController@modificar')->name('modificarArea');
Route::any('/areas/buscar', 'AreaController@index')->name('buscarArea');

//Modalidades

Route::get('/modadelidad','modalidades@index')->name('modadelidad');
Route::get('/modadelidad/registrarmodalidad','modalidades@registrar')->name('registrarmodalidad');
Route::get('/modadelidad/listaModalidad','menuController@listaModalidad')->name('listaModalidad');
