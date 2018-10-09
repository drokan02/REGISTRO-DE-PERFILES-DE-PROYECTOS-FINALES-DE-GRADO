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
Route::any('/areas/subir_Excel', 'AreaController@subirExcel')->name('subirAreas');
Route::any('/areas/subir_Excel/importar', 'AreaController@importar')->name('importarAreas');


//tutores
Route::get('/profesionales','ProfesionalController@index')->name('listarProfesionales');
Route::get('/profesionales/registrar','ProfesionalController@registrar')->name('registroProfesional');
Route::post('/profesionales/almacenar','ProfesionalController@almacenar')->name('almacenarProfesional');


//Subareas
Route::get('areas/subareas/{area}','SubareaController@index')->name('subareas');
Route::get('areas/subareas/registrar/{area}','SubareaController@registrar')->name('registrarSubarea');
Route::post('areas/subareas/almacenar/{area}','SubareaController@almacenar')->name('almacenarSubarea');
Route::any('/areas/subareas/editar/{id}','SubareaController@editar')->name('editarSubarea');
Route::post('areas/subareas/modificar/{id}','SubareaController@modificar')->name('modificarSubarea');
Route::any('areas/subareas/eliminar/{id}','SubareaController@eliminar')->name('eliminarSubarea');


//Modalidades
Route::get('/modadelidad','modalidades@index')->name('modalidad');
Route::get('/modadelidad/registrarmodalidad','modalidades@registrar')->name('registrarmodalidad');
Route::any('/modadelidad/registrar/almacenar','modalidades@almacenar')->name('almacenarModalidad');
Route::get('/modadelidad/editarmodal/{modalidad}','modalidades@editar')->name('editarModalidad');
Route::put('/modadelidad/{modalidad}','modalidades@modificar')->name('modificarModalidad');
Route::delete('/modadelidad/eliminar/{modalidad}','modalidades@eliminar')->name('eliminarModalidad');
Route::any('/modadelidad/buscar', 'modalidades@index')->name('buscarModal');
Route::any('/modadelidad/ver/{id}','modalidades@ver')->name('ver');


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


