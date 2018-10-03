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
Route::get('/cambiar_contraseña/{user}','usuarioController@cambiarContraseña')->name('cambiarContraseña');
Route::post('/guardar_contraseña/{user}','usuarioController@guardarContraseña')->name('guardarContraseña');

//Areas
Route::get('/areas','AreaController@index')->name('Areas');
Route::get('/areas/registrar','AreaController@registrar')->name('registrarArea');
Route::any('/areas/registrar/almacenar','AreaController@almacenar')->name('almacenarArea');
Route::any('/areas/editar/{id}','AreaController@editar')->name('editarArea');
Route::any('/areas/editar/modificar/{id}','AreaController@modificar')->name('modificarArea');
Route::any('/areas/eliminar/{id}','AreaController@eliminar')->name('eliminarArea');
Route::any('/areas/buscar', 'AreaController@index')->name('buscarArea');
Route::any('/areas/ver/{id}','AreaController@ver')->name('verArea');

//Subareas
Route::get('areas/subareas/{area}','SubareaController@index')->name('subareas');
Route::get('areas/subareas/registrar/{area}','SubareaController@registrar')->name('registrarSubarea');
Route::post('areas/subareas/almacenar/{area}','SubareaController@almacenar')->name('almacenarSubarea');
Route::any('/areas/subareas/editar/{id}','SubareaController@editar')->name('editarSubarea');
Route::post('areas/subareas/modificar/{id}','SubareaController@modificar')->name('modificarSubarea');
Route::post('areas/subareas/eliminar/{id}','SubareaControler@eliminar')->name('eliminarSubarea');
//Modalidades

Route::get('/modadelidad','modalidades@index')->name('modadelidad');
Route::get('/modadelidad/registrarmodalidad','modalidades@registrar')->name('registrarmodalidad');
Route::get('/modadelidad/listaModalidad','menuController@listaModalidad')->name('listaModalidad');
Route::any('/modadelidad/registrar/almacenar','modalidades@almacenar')->name('almacenarModalidad');
Route::any('/modadelidad/editarmodal/{id}','modalidades@editar')->name('editarModalidad');
Route::any('/modadelidad/editarmodal/modificar/{id}','modalidades@modificar')->name('modificarModalidad');
Route::any('/modadelidad/eliminar/{id}','modalidades@eliminar')->name('eliminarModalidad');
Route::any('/modadelidad/buscar', 'modalidades@index')->name('buscarModal');
Route::any('/modadelidad/ver/{id}','modadelidades@ver')->name('ver');

///

//tutores
Route::get('profesionales','tutores@index')->name('profesionales');
Route::get('profesionales/registrotutor','tutores@registrar')->name('registrotutor');
Route::get('profesionales/listarTutor','menuController@listarTutor')->name('listarTutor');



//carreras
Route::get('/carreras','CarreraController@index')->name('carreras');
Route::get('/carreras/crear','CarreraController@crear')->name('crearCarrera');
Route::post('/carreras/guardar','CarreraController@guardar')->name('guardarCarrera');
//Route::get('/carreras/{carrera}','CarreraController@detalle')->name('detalleCarrera');
Route::get('/carreras/{carrera}/editar','CarreraController@editar')->name('editarCarrera');
Route::put('/carreras/{carrera}','CarreraController@actualizar')->name('actualizarCarrera');//put metodo para actualizar
Route::delete('/carreras/{carrera}/eliminar','CarreraController@eliminar')->name('eliminarCarrera');

//docentes
Route::get('/docentes','docenteController@index')->name('docentes');


