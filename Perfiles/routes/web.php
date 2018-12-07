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
Route::get('/verifiqueCuenta',function () {
    return view('emails/confirmarCuenta');
})->name('confirmarCuenta');

Route::get('/prueba', function () {
    $valor = 12;
    return view('complementos.prueba',compact('valor'));
});

//Roles
Route::get('/menu','menuController@index')->name('menu');
Route::get('/roles','RoleController@index')->name('roles');
Route::get('/roles/crear','RoleController@crear')->name('crearRol');
Route::post('/roles/guardar','RoleController@guardar')->name('guardarRol');
Route::get('/roles/{role}/editar','RoleController@editar')->name('editarRol');
Route::any('/roles/{role}','RoleController@actualizar')->name('actualizarRol');
Route::any('/roles/{role}/eliminar','RoleController@eliminar')->name('eliminarRol');

//usuarios
Route::get('/usuarios','usuarioController@index')->name('usuarios');
Route::get('/usuarios/crear','usuarioController@crear')->name('crearUsuario');
Route::post('/usuarios/guardar','usuarioController@guardar')->name('guardarUsuario');
Route::get('/usuarios/{user}','usuarioController@detalle')->name('detalleUsuario');
Route::get('/usuarios/{user}/editar','usuarioController@editar')->name('editarUsuario');
Route::put('/usuarios/{user}','usuarioController@actualizar')->name('actualizarUsuario');//put metodo para actualizar
Route::any('/usuarios/{user}/eliminar','usuarioController@eliminar')->name('eliminarUsuario');
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
Route::get('/profesionales/registrar','ProfesionalController@registrar')->name('registroProfesional')->middleware('permisos:profesionales');;
Route::post('/profesionales/almacenar','ProfesionalController@almacenar')->name('almacenarProfesional')->middleware('permisos:profesionales');;
Route::any('/profesionales/editar/{id}','ProfesionalController@editar')->name('editarProfesional');
Route::post('/profesionales/editar/modificar/{profesional}','ProfesionalController@modificar')->name('modificarProfesional');
Route::any('/profesionales/eliminar/{profesional}','ProfesionalController@eliminar')->name('eliminarProfesional');
Route::any('/profesionales/ver/{profesional}','ProfesionalController@ver')->name('verProfesional');
Route::any('/profesionales/tutoria/{profesional}','ProfesionalController@tutoria')->name('tutoriaProfesional');
Route::any('/profesionales/tutores/{perfil}/{profesional}','ProfesionalController@tutores')->name('tutores');
Route::any('/profesionales/tutoria/renunciar/{profesional}/{perfil}','ProfesionalController@renunciar')->name('renunciarTutoria');

//Subareas
Route::get('areas/subareas/{area}','SubareaController@index')->name('subareas');
Route::get('areas/subareas/registrar/{area}','SubareaController@registrar')->name('registrarSubarea');
Route::post('areas/subareas/almacenar/{area}','SubareaController@almacenar')->name('almacenarSubarea');
Route::any('/areas/subareas/editar/{id}','SubareaController@editar')->name('editarSubarea');
Route::post('areas/subareas/modificar/{id}','SubareaController@modificar')->name('modificarSubarea');
Route::any('areas/subareas/eliminar/{id}','SubareaController@eliminar')->name('eliminarSubarea');



//Modalidades
Route::get('/modalidad','modalidades@index')->name('modalidad');
Route::get('/modalidad/registrarmodalidad','modalidades@registrar')->name('registrarmodalidad');
Route::any('/modalidad/registrar/almacenar','modalidades@almacenar')->name('almacenarModalidad');
Route::get('/modalidad/editarmodal/{modalidad}','modalidades@editar')->name('editarModalidad');
Route::put('/modalidad/{modalidad}','modalidades@modificar')->name('modificarModalidad');
Route::any('/modalidad/eliminar/{modalidad}','modalidades@eliminar')->name('eliminarModalidad');
Route::any('/modalidad/buscar', 'modalidades@index')->name('buscarModal');
Route::any('/modalidad/ver/{id}','modalidades@ver')->name('ver');
Route::get('/modalidad/importar','modalidades@importar')->name('importarModalidad');
Route::post('/modalidad/importacion','modalidades@importacion')->name('importacionModalidad');


//carreras
Route::get('/carreras','CarreraController@index')->name('carreras');
Route::get('/carreras/crear','CarreraController@crear')->name('crearCarrera');
Route::post('/carreras/guardar','CarreraController@guardar')->name('guardarCarrera');
//Route::get('/carreras/{carrera}','CarreraController@detalle')->name('detalleCarrera');
Route::get('/carreras/{carrera}/editar','CarreraController@editar')->name('editarCarrera');
Route::put('/carreras/{carrera}','CarreraController@actualizar')->name('actualizarCarrera');//put metodo para actualizar
Route::delete('/carreras/{carrera}/eliminar','CarreraController@eliminar')->name('eliminarCarrera');
Route::get('/carreras/importar','CarreraController@importar')->name('importarCarreras');
Route::post('/carreras/importacion','CarreraController@importacion')->name('importacionCarrera');
Route::any('/carreras/agregarArea/{carrera}', 'CarreraController@areas')->name('areasCarrera');
Route::any('/carreras/agregarArea/almacenar/{carrera}', 'CarreraController@almacenarArea')->name('almacenarAreasCarrera');
Route::any('/carreras/eliminarArea/{carrera}/{area}', 'CarreraController@EliminarArea')->name('eliminarCarreraArea');
//docentes
Route::get('/docentes','docenteController@index')->name('Docentes');
Route::get('/docentes/registrar', 'docenteController@registrar')->name('registrarDocente')->middleware('permisos:docentes');
Route::any('/docentes/registrar/almacenar','docenteController@almacenar')->name('almacenarDocente')->middleware('permisos:docentes');
Route::any('/docentes/editar/{docente}','docenteController@editar')->name('editarDocente');
Route::any('/docentes/editar/modificar/{docente}','docenteController@modificar')->name('modificarDocente');
Route::any('/docentes/eliminar/{docente}','docenteController@eliminar')->name('eliminarDocente');
Route::any('/docentes/ver/{docente}','docenteController@ver')->name('verDocente');
Route::get('/cambiar_contraseña_docente/{docente}','docenteController@cambiarContraseña')->name('cambiarContraseñaDocente');
Route::post('/guardar_contraseña_docente/{docente}','docenteController@guardarContraseña')->name('guardarContraseñaDocente');
Route::get('/tutoria/{docente}','docenteController@tutoria')->name('tutoriaDocente');
Route::get('/exportar_pdf_tutoria/{docente}','docenteController@descargarPdf')->name('tutoriaDocentePdf');

//estudiantes
Route::get('/estudiantes','EstudianteController@index')->name('estudiantes');
Route::get('/estudiantes/crear','EstudianteController@crear')->name('CrearEstudiantes');
Route::post('/estudiantes/guardar','EstudianteController@guardar')->name('guardarEstudiante');
Route::get('/estudiantes/{estudiante}','EstudianteController@detalle')->name('detalleEstudiante');
Route::get('/estudiantes/{estudiante}/editar','EstudianteController@editar')->name('editarEstudiante');
Route::put('/estudiantes/{estudiante}','EstudianteController@actualizar')->name('actualizarEstudiante');
Route::get('/cambiar_contraseña_estudiante/{estudiante}','EstudianteController@cambiarContraseña')->name('cambiarContraseñaEstudiante');
Route::post('/guardar_contraseña_estudiante/{estudiante}','EstudianteController@guardarContraseña')->name('guardarContraseñaEstudiante');
Route::delete('/estudiantes/{estudiante}/eliminar','EstudianteController@eliminar')->name('eliminarEstudiante');

//login
Route::get('login','Auth\LoginController@showLoginForm')->name('login');
Route::post('login','Auth\LoginController@login')->name('loginPost');
Route::get('logout','Auth\LoginController@logout')->name('logout');

//registro
Route::get('register','Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register','Auth\RegisterController@register')->name('registerPost');

//perfiles

Route::get('/seleccion_modalidad','PerfilController@seleccion')->name('seleccionarPerfil');
Route::post('/seleccionarFormulario','PerfilController@formulario')->name('formularioPerfil');




//fechas
Route::get('/fechas','FechasController@index')->name('fechas');
Route::get('/fechas/guardar','FechasController@guardar')->name('guadarfecha');
Route::any('/perfil/ver/{perfil}','PerfilController@ver')->name('verPerfil');
Route::get('/perfil/verPdf{perfil}','PerfilController@vistaPdf')->name('descargaPdf');
Route::get('/perfil','PerfilController@index')->name('perfiles');
Route::get('/perfil/registrarPerfil','PerfilController@nuevoFormulario')->name('nuevoPerfil')->middleware('permisos:registrar_perfil');
Route::any('/perfil/registrarPerfil/mostrarForm','PerfilController@mostrarForm')->name('mostrarFormulario')->middleware('permisos:registrar_perfil');
Route::post('/perfil/registrarPerfil/almacenar','PerfilController@almacenar')->name('almacenarPerfil')->middleware('permisos:registrar_perfil');
Route::get('/perfil/editar/{perfil}','PerfilController@editar')->name('editarPerfil')->middleware('permisos:editar_perfil');
Route::post('/perfil/editar/modificar/{perfil}','PerfilController@modificar')->name('modificarPerfil')->middleware('permisos:editar_perfil');
//Route::post('/perfil/editar/{perfil}/modificar','PerfilController@modificar')->name('mPerfil');
Route::any('/perfil/publicar/{perfil}','PerfilController@publicar')->name('publicarPerfil');
Route::any('/perfil/eliminar/{perfil}','PerfilController@eliminar')->name('eliminarPerfil')->middleware('permisos:eliminar_perfil');
Route::any('/perfil/cambiarEstado/{perfil}','PerfilController@cambiarEstado')->name('cambiarEstadoPerfil')->middleware('permisos:cambiar_estado_perfil');

//Gestion
Route::any('/menu/Gestion', 'GestionController@index')->name('gestiones');
Route::get('menu/Gestion/registrar', 'GestionController@registrar')->name('registrarGestion');
Route::any('menu/Gestion/registrar/almacenar', 'GestionController@almacenar')->name('almacenarGestion');
Route::get('menu/Gestion/editar/{gestion}', 'GestionController@editar')->name('editarGestion');
Route::post('menu/Gestion/editar/modificar/{gestion}', 'GestionController@modificar')->name('modificarGestion');

// E-mail verification
Route::get('/register/verify/{code}', 'Auth\RegisterController@verify');


//notificacion
Route::get('/notificar','menuController@notificar')->name('notificar');

//reportes
Route::get('/generar_reportes','ReportesController@generar')->name('generar')->middleware('permisos:reportes');
Route::post('/generador/reportes','ReportesController@generador')->name('generador')->middleware('permisos:reportes');
Route::get('/reportes/pdf','ReportesController@reporte')->name('reportePdf')->middleware('permisos:reportes');

Route::get('/guiaFormulario','guiaController@index')->name('guiaFormulario');