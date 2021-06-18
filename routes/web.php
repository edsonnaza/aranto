<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\Seguridad\LoginController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UsuarioController;
use App\Http\Controllers\Admin\PermisoController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\RolController;
use App\Http\Controllers\Admin\MenuRolController;
use App\Http\Controllers\Admin\PermisoRolController;
use App\Http\Controllers\Admin\SedeController;
use App\Http\Controllers\CategoriaPadreController;
use App\Http\Controllers\CategoriaHijosController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\LibroPrestamoController;
use App\Http\Controllers\SeguroController;
use App\Http\Controllers\TipoPersonaController;
use App\Http\Controllers\EspecialidadController;
use App\Http\Controllers\EstadoCivilController;
use App\Http\Controllers\ProfesionController;
use App\Http\Controllers\TipoDNIController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\UnidadController;
use App\Http\Controllers\MedidasBasicasController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\ComprasFIController;
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

/*Route::get('/', function () {
    return view('seguridad.index');
});*/

/*RUTAS PASSWORD RESET*/

 
 

Route::get('password/reset', [ForgotPasswordController::class,'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class,'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class,'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class,'reset'])->name('password.update');


 Route::get('/', [InicioController::class,'index'])->name('inicio')->middleware('auth');
Route::get('seguridad/login', [LoginController::class,'index'])->name('login');
Route::post('seguridad/login', [LoginController::class,'login'])->name('login_post');
Route::get('seguridad/logout', [LoginController::class,'logout'])->name('logout');
Route::post('ajax-sesion', [AjaxController::class,'setSession'])->name('ajax')->middleware('auth');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'superadmin']], function () {
  
    Route::get('', [AdminController::class,'index']);


    /*RUTAS DE USUARIO*/
    Route::get('usuario',  [UsuarioController::class,'index'])->name('usuario');
    Route::get('usuario/crear', [UsuarioController::class,'crear'])->name('crear_usuario');
    Route::post('usuario', [UsuarioController::class,'guardar'])->name('guardar_usuario');
    Route::get('usuario/{id}/editar', [UsuarioController::class,'editar'])->name('editar_usuario');
    Route::put('usuario/{id}', [UsuarioController::class,'actualizar'])->name('actualizar_usuario');
    Route::delete('usuario/{id}', [UsuarioController::class,'eliminar'])->name('eliminar_usuario');
    /*RUTAS DE PERMISO*/
    Route::get('permiso', [PermisoController::class,'index'])->name('permiso');
    Route::get('permiso/crear', [PermisoController::class,'crear'])->name('crear_permiso');
    Route::post('permiso', [PermisoController::class,'guardar'])->name('guardar_permiso');
    Route::get('permiso/{id}/editar', [PermisoController::class,'editar'])->name('editar_permiso');
    Route::put('permiso/{id}', [PermisoController::class,'actualizar'])->name('actualizar_permiso');
    Route::delete('permiso/{id}', [PermisoController::class,'eliminar'])->name('eliminar_permiso');
    /*RUTAS DEL MENU*/
    Route::get('menu', [MenuController::class,'index'])->name('menu');
    Route::get('menu/crear', [MenuController::class,'crear'])->name('crear_menu');
    Route::post('menu', [MenuController::class,'guardar'])->name('guardar_menu');
    Route::get('menu/{id}/editar', [MenuController::class,'editar'])->name('editar_menu');
    Route::put('menu/{id}', [MenuController::class,'actualizar'])->name('actualizar_menu');
    Route::get('menu/{id}/eliminar', [MenuController::class,'eliminar'])->name('eliminar_menu');
    Route::post('menu/guardar-orden', [MenuController::class,'guardarOrden'])->name('guardar_orden');
    /*RUTAS ROL*/
    Route::get('rol', [RolController::class,'index'])->name('rol');
    Route::get('rol/crear', [RolController::class,'crear'])->name('crear_rol');
    Route::post('rol', [RolController::class,'guardar'])->name('guardar_rol');
    Route::get('rol/{id}/editar', [RolController::class,'editar'])->name('editar_rol');
    Route::put('rol/{id}', [RolController::class,'actualizar'])->name('actualizar_rol');
    Route::delete('rol/{id}', [RolController::class,'eliminar'])->name('eliminar_rol');
    /*RUTAS MENU_ROL*/
    Route::get('menu-rol', [MenuRolController::class,'index'])->name('menu_rol');
    Route::post('menu-rol', [MenuRolController::class,'guardar'])->name('guardar_menu_rol');
    /*RUTAS PERMISO_ROL*/
    Route::get('permiso-rol', [PermisoRolController::class,'index'])->name('permiso_rol');
    Route::post('permiso-rol', [PermisoRolController::class,'guardar'])->name('guardar_permiso_rol');

    

 /** RUTAS DE SEDES */    
 Route::get('sede', [SedeController::class,'index'])->name('sede');
 Route::get('sede/crear', [SedeController::class,'crear'])->name('crear_sede');
 Route::post('sede', [SedeController::class,'guardar'])->name('guardar_sede');
 Route::get('sede/{id}/editar', [SedeController::class,'editar'])->name('editar_sede');
 Route::put('sede/{id}', [SedeController::class,'actualizar'])->name('actualizar_sede');
 Route::delete('sede/{id}', [SedeController::class,'eliminar'])->name('eliminar_sede');


    
    
});


 
Route::group(['middleware' => ['auth']], function () {
    //

/** RUTAS DE CATASTRO DE CATEGORIAS PADRE */
Route::get('categoriapadre', [CategoriaPadreController::class,'index'])->name('categoriapadre');
Route::get('categoriapadre/crear', [CategoriaPadreController::class,'crear'])->name('crear_categoria.padre');
Route::post('categoriapadre', [CategoriaPadreController::class,'guardar'])->name('guardar_categoria.padre');
Route::get('categoriapadre/{id}/editar', [CategoriaPadreController::class,'editar'])->name('editar_categoria.padre');
Route::put('categoriapadre/{id}', [CategoriaPadreController::class,'actualizar'])->name('actualizar_categoria.padre');
Route::delete('categoriapadre/{id}', [CategoriaPadreController::class,'eliminar'])->name('eliminar_categoria.padre');

/** RUTAS DE CATASTRO DE CATEGORIAS HIJOS */

Route::get('categoriahijos/{id}', [CategoriaHijosController::class,'mostrar'])->name('categoriahijos');
Route::get('categoriahijos/{id}/crear', [CategoriaHijosController::class,'crear'])->name('crear_categoria.hijo');
Route::post('categoriahijos', [CategoriaHijosController::class,'guardar'])->name('guardar_categoria.hijo');
Route::get('categoriahijos/{id}/editar', [CategoriaHijosController::class,'editar'])->name('editar_categoria.hijo');
Route::get('categoriahijos/{id}', [CategoriaHijosController::class,'mostrar'])->name('mostrarhijos');
Route::delete('categoriahijos/{id}', [CategoriaHijosController::class,'eliminar'])->name('eliminar_categoria.hijo');
Route::put('categoriahijos/{id}', [CategoriaHijosController::class,'actualizar'])->name('actualizar_categoria.hijo');




/** RUTAS DE CATASTRO DE PACIENTES */
Route::get('paciente', [PacienteController::class,'index'])->name('paciente');
Route::get('paciente/crear', [PacienteController::class,'crear'])->name('crear_paciente');
Route::post('paciente', [PacienteController::class,'guardar'])->name('guardar_paciente');
Route::get('paciente/{id}/editar', [PacienteController::class,'editar'])->name('editar_paciente');
Route::put('paciente/{id}', [PacienteController::class,'actualizar'])->name('actualizar_paciente');
Route::delete('paciente/{id}', [PacienteController::class,'eliminar'])->name('eliminar_paciente');

      
Route::get('libro', [LibroController::class,'index'])->name('libro') ;
Route::get('libro/crear', [LibroController::class,'crear'])->name('crear_libro');
Route::post('libro', [LibroController::class,'guardar'])->name('guardar_libro');
Route::post('libro/{libro}', [LibroController::class,'ver'])->name('ver_libro');
Route::get('libro/{id}/editar', [LibroController::class,'editar'])->name('editar_libro');
Route::put('libro/{id}', [LibroController::class,'actualizar'])->name('actualizar_libro');
Route::delete('libro/{id}', [LibroController::class,'eliminar'])->name('eliminar_libro');
/**
 * Rutas Libro Prestamo
 */
Route::get('libro-prestamo', [LibroPrestamoController::class,'index'])->name('libro-prestamo');
Route::get('libro-prestamo/crear', [LibroPrestamoController::class,'crear'])->name('libro-prestamo.crear');
Route::post('libro-prestamo', [LibroPrestamoController::class,'guardar'])->name('libro-prestamo.guardar');
Route::put('libro-prestamo/{libro}', [LibroPrestamoController::class,'devolucion'])->name('libro-prestamo.devolver');
/**
 * Rutas Catastro Seguros
 */

/*Route::get('seguro', 'SeguroController@index')->name('seguro')->middleware('auth');
Route::get('seguro/crear', 'SeguroController@crear')->name('crear_seguro')->middleware('auth');
Route::post('seguro', 'SeguroController@guardar')->name('guardar_seguro')->middleware('auth');
Route::post('seguro/{seguro}', 'SeguroController@ver')->name('ver_seguro')->middleware('auth');
Route::get('seguro/{id}/editar', 'SeguroController@editar')->name('editar_seguro')->middleware('auth');
Route::put('seguro/{id}', 'SeguroController@actualizar')->name('actualizar_seguro')->middleware('auth');
Route::delete('seguro/{id}', 'SeguroController@eliminar')->name('eliminar_seguro')->middleware('auth');*/

 /*RUTAS DE CASTASTRO DE SEGUROS*/
 Route::get('seguro', [SeguroController::class,'index'])->name('seguro');
 Route::get('seguro/crear', [SeguroController::class,'crear'])->name('crear_seguro');
 Route::post('seguro', [SeguroController::class,'guardar'])->name('guardar_seguro');
 Route::get('seguro/{id}/editar', [SeguroController::class,'editar'])->name('editar_seguro') ;
 Route::put('seguro/{id}', [SeguroController::class,'actualizar'])->name('actualizar_seguro') ;
 Route::delete('seguro/{id}', [SeguroController::class,'eliminar'])->name('eliminar_seguro') ;

 /** RUTAS DE TIPO DE PERSONAS */    
 Route::get('tipo_persona', [TipoPersonaController::class,'index'])->name('tipo_persona') ;
 Route::get('tipo_persona/crear', [TipoPersonaController::class,'crear'])->name('crear_tipo_persona') ;
 Route::post('tipo_persona', [TipoPersonaController::class,'guardar'])->name('guardar_tipo_persona') ;
 Route::get('tipo_persona/{id}/editar', [TipoPersonaController::class,'editar'])->name('editar_tipo_persona') ;
 Route::put('tipo_persona/{id}', [TipoPersonaController::class,'actualizar'])->name('actualizar_tipo_persona') ;
 Route::delete('tipo_persona/{id}', [TipoPersonaController::class,'eliminar'])->name('eliminar_tipo_persona') ;

 /** RUTAS DE TIPO DE ESPECIALIDAD */    
 Route::get('especialidad', [EspecialidadController::class,'index'])->name('especialidad') ;
 Route::get('especialidad/crear', [EspecialidadController::class,'crear'])->name('crear_especialidad') ;
 Route::post('especialidad', [EspecialidadController::class,'guardar'])->name('guardar_especialidad') ;
 Route::get('especialidad/{id}/editar', [EspecialidadController::class,'editar'])->name('editar_especialidad') ;
 Route::put('especialidad/{id}', [EspecialidadController::class,'actualizar'])->name('actualizar_especialidad') ;
 Route::delete('especialidad/{id}', [EspecialidadController::class,'eliminar'])->name('eliminar_especialidad') ;

 
/** RUTAS DE TIPO DE ESTADO CIVIL */    
Route::get('estado-civil', [EstadoCivilController::class,'index'])->name('estado-civil') ;
Route::get('estado-civil/crear', [EstadoCivilController::class,'crear'])->name('crear_estado-civil') ;
Route::post('estado-civil', [EstadoCivilController::class,'guardar'])->name('guardar_estado-civil') ;
Route::get('estado-civil/{id}/editar', [EstadoCivilController::class,'editar'])->name('editar_estado-civil') ;
Route::put('estado-civil/{id}', [EstadoCivilController::class,'actualizar'])->name('actualizar_estado-civil') ;
Route::delete('estado-civil/{id}', [EstadoCivilController::class,'eliminar'])->name('eliminar_estado-civil') ;

 
/** RUTAS DE PROFESION */    
Route::get('profesion', [ProfesionController::class,'index'])->name('profesion');
Route::get('profesion/crear', [ProfesionController::class,'crear'])->name('crear_profesion');
Route::post('profesion', [ProfesionController::class,'guardar'])->name('guardar_profesion');
Route::get('profesion/{id}/editar', [ProfesionController::class,'editar'])->name('editar_profesion');
Route::put('profesion/{id}', [ProfesionController::class,'actualizar'])->name('actualizar_profesion');
Route::delete('profesion/{id}', [ProfesionController::class,'eliminar'])->name('eliminar_profesion');

  /** RUTAS DE TIPODNI */    
Route::get('tipodni', [TipoDNIController::class,'index'])->name('tipodni');
Route::get('tipodni/crear', [TipoDNIController::class,'crear'])->name('crear_tipodni');
Route::post('tipodni', [TipoDNIController::class,'guardar'])->name('guardar_tipodni');
Route::get('tipodni/{id}/editar', [TipoDNIController::class,'editar'])->name('editar_tipodni');
Route::put('tipodni/{id}', [TipoDNIController::class,'actualizar'])->name('actualizar_tipodni');
Route::delete('tipodni/{id}', [TipoDNIController::class,'eliminar'])->name('eliminar_tipodni');

// Route::post('search', 'PacienteController@BuscarPersona')->name('buscar_persona')->middleware('auth');
//Route::post('/employees/getEmployees/', 'EmployeesController@getEmployees')->name('employees.getEmployees');


 Route::get('/search', [PacienteController::class,'indexsearch']);
Route::post('search/fetch', [PacienteController::class,'BuscarPersona'])->name('autocomplete.fetch');

 
 /** RUTAS DE CATASTRO DE MEDICOS */    
 Route::get('medico', [MedicoController::class,'index'])->name('medico');
 Route::get('medico/crear', [MedicoController::class,'crear'])->name('crear_medico');
 Route::post('medico', [MedicoController::class,'guardar'])->name('guardar_medico');
 Route::get('medico/{id}/editar', [MedicoController::class,'editar'])->name('editar_medico');
 Route::put('medico/{id}', [MedicoController::class,'actualizar'])->name('actualizar_medico');
 Route::delete('medico/{id}', [MedicoController::class,'eliminar'])->name('eliminar_medico');
 

 /** RUTAS DE CATASTRO DE PERSONAS */    
 Route::get('persona', [PersonaController::class,'index'])->name('persona');
 Route::get('persona/crear', [PersonaController::class,'crear'])->name('crear_persona');
 Route::post('persona', [PersonaController::class,'guardar'])->name('guardar_persona');
 Route::get('persona/{id}/editar', [PersonaController::class,'editar'])->name('editar_persona');
 Route::put('persona/{id}', [PersonaController::class,'actualizar'])->name('actualizar_persona');
 Route::delete('persona/{id}', [PersonaController::class,'eliminar'])->name('eliminar_persona');

 /** RUTAS DE CATASTRO DE ALMACENES/UNIDAD */
Route::get('unidad', [UnidadController::class,'index'])->name('unidad');
Route::get('unidad/crear', [UnidadController::class,'crear'])->name('crear_unidad');
Route::post('unidad', [UnidadController::class,'guardar'])->name('guardar_unidad');
Route::get('unidad/{id}/editar', [UnidadController::class,'editar'])->name('editar_unidad');
Route::put('unidad/{id}', [UnidadController::class,'actualizar'])->name('actualizar_unidad');
Route::delete('unidad/{id}', [UnidadController::class,'eliminar'])->name('eliminar_unidad');

/** RUTAS DE CATASTRO DE UNIDAD DE MEDIDAS BASICAS */
Route::get('medidas_basicas', [MedidasBasicasController::class,'index'])->name('medidas_basicas');
Route::get('medidas_basicas/crear', [MedidasBasicasController::class,'crear'])->name('crear_medidas_basicas');
Route::post('medidas_basicas', [MedidasBasicasController::class,'guardar'])->name('guardar_medidas_basicas');
Route::get('medidas_basicas/{id}/editar', [MedidasBasicasController::class,'editar'])->name('editar_medidas_basicas');
Route::put('medidas_basicas/{id}', [MedidasBasicasController::class,'actualizar'])->name('actualizar_medidas_basicas');
Route::delete('medidas_basicas/{id}', [MedidasBasicasController::class,'eliminar'])->name('eliminar_medidas_basicas');



/** RUTAS DE CATASTRO DE PRODUCTOS: CONSULTAS y SERVICIOS */
Route::get('productos', [ProductosController::class,'index'])->name('productos');
Route::get('productos/crear', [ProductosController::class,'crear'])->name('crear_producto');
Route::post('productos', [ProductosController::class,'guardar'])->name('guardar_producto');
Route::get('productos/{id}/editar', [ProductosController::class,'editar'])->name('editar_producto');
Route::put('productos/{id}', [ProductosController::class,'actualizar_producto'])->name('actualizar_producto');
Route::delete('productos/{id}', [ProductosController::class,'eliminar_producto'])->name('eliminar_producto');
//Route::get('categoriahijos/{id}', 'ProductosController@buscar_cathijos')->name('cargar_cathijos');
Route::get('/gethijos/{id_categoriapadre}', [ProductosController::class,'buscar_cathijos'])->name('gethijos');
//Route::get('/productos/{id_categoriapadre}', 'ProductosController@buscar_cathijos')->name('gethijos');


//Route::get('/careers', 'StudentController@getCareers');

/** RUTAS DE CATASTRO DE PRECIOS DE PRODUCTOS POR SEGUROS: CONSULTAS y SERVICIOS */

Route::get('precioproductos/{id}', [ProductosController::class,'editar_precioproducto'])->name('editar_precioproducto');
//Route::delete('precioproductos/{id}', [ProductosController::class,'@eliminar_precioproducto')->name('eliminar_precioproducto');
Route::put('precioproductos/{id}', [ProductosController::class,'actualizar_precioproducto'])->name('actualizar_precioproducto');
//Route::get('precioproductos/crear', [ProductosController@crear_precioproducto'])->name('crear_precioproducto');
Route::get('precioproductos/crear_precioporseguro/{id}', [ProductosController::class,'crear_precioseguro'])->name('crear_precioporseguro');
Route::post('precioproductos/{id}', [ProductosController::class,'guardar_nuevoprecioporseguro'])->name('guardar_nuevoprecioporseguro');
Route::delete('precioproductos/{id}', [ProductosController::class,'eliminar_precioporseguro'])->name('eliminar_precioporseguro');

/** RUTAS DE CATASTRO DE ARTICULOS PRODUCTOS: DESCARTABLES y MEDICAMENTOS POR UNIDAD */
Route::get('articulos', [ArticuloController::class,'index'])->name('articulos');
Route::get('articulos/crear', [ArticuloController::class,'crear'])->name('crear_articulo');
Route::post('articulos', [ArticuloController::class,'guardar'])->name('guardar_articulo');
Route::get('articulos/{id}', [ArticuloController::class,'editar'])->name('editar_articulo');
Route::put('articulos/{id}', [ArticuloController::class,'actualizar'])->name('actualizar_articulo');
Route::delete('articulos/{id}', [ArticuloController::class,'eliminar'])->name('eliminar_articulo');


/** RUTAS DE COMPRAS PARA FARMACIA INTERNA*/
Route::get('comprasfi', [ComprasFIController::class,'index'])->name('comprasfi');
Route::get('comprasfi/crear', [ComprasFIController::class,'crear'])->name('crear_comprasfi');
Route::post('comprasfi', [ComprasFIController::class,'guardar'])->name('guardar_comprasfi');
Route::get('comprasfi/{id}/editar', [ComprasFIController::class,'editar'])->name('editar_comprasfi');
Route::put('comprasfi/{id}', [ComprasFIController::class,'actualizar'])->name('actualizar_comprasfi');
Route::delete('comprasfi/{id}', [ComprasFIController::class,'eliminar'])->name('eliminar_comprasfi');




});
