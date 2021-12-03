<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\CicloController;
use App\Http\Controllers\CicloModuloController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\DocenteImparteModuloController;
use App\Http\Controllers\DocenteTutColectivoCicloController;
use App\Http\Controllers\DocGeneralController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\DocumentosProyectoController;
use App\Http\Controllers\FechaController;
use App\Http\Controllers\GrupoRubricaController;
//use App\Http\Controllers\MensajeController;
use App\Http\Controllers\ModuloController;
use App\Http\Controllers\ModulosMatriculadoController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\RubricaController;
use App\Http\Controllers\TipoProyectoCicloController;
use App\Http\Controllers\TipoProyectoController;
use App\Http\Controllers\TutorEvaluaProyectoController;
use App\Http\Controllers\ProyectosPropuestoController;
use App\Http\Controllers\ParametroController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\EstadosProyectoController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

	//-----------------------------------------------------------------------------------------//
	//--------------- LARAVEL NO MANEJA BIEN LAS RUTAS PUT CON DATOS DE FORMULARIO-------------//
	//--------------------------CREAMOS RUTAS ALTERNATIVAS--------------------------------------//
//Al enviar los datos vía form data Laravel no puede acceder a los datos enviados con PUt/PATCH -->reconvertimos rutas en POST.
Route::post('alumnos/{id}',[AlumnoController::class,'update']);
Route::post('ciclos/{id}',[CicloController::class,'update']);
Route::post('ciclo_modulos/{id}',[CicloModuloController::class,'update']);
Route::post('docentes/{id}',[DocenteController::class,'update']);
Route::post('docente_imparte_modulos/{id}',[DocenteImparteModuloController::class,'update']);
//Route::post('doc_generals/{id}',[DocGeneralController::class,'update']);
Route::post('documentos/{id}',[DocumentoController::class,'update']);
Route::post('documentos_proyectos/{id}',[DocumentosProyectoController::class,'update']);
Route::post('fechas/{id}',[FechaController::class,'update']);
Route::post('grupo_rubricas/{id}',[GrupoRubricaController::class,'update']);
//Route::post('mensajes/{id}',[MensajeController::class,'update']);
Route::post('modulos/{id}',[ModuloController::class,'update']);
Route::post('modulos_matriculados/{id}',[ModulosMatriculadoController::class,'update']);
Route::post('proyectos/{id}',[ProyectoController::class,'update']);
Route::post('rubricas/{id}',[RubricaController::class,'update']);
Route::post('tipo_proyecto_ciclos/{id}',[TipoProyectoCicloController::class,'update']);
Route::post('tipo_proyectos/{id}',[TipoProyectoController::class,'update']);
Route::post('tutor_evalua_proyectos/{id}',[TutorEvaluaProyectoController::class,'update']);
Route::post('proyectos_propuestos/{id}',[ProyectosPropuestoController::class,'update']);
Route::post('docente_tut_colectivo_ciclos/{id}',[DocenteTutColectivoCicloController::class,'update']);
Route::post('estados_proyectos/update/{id}',[EstadosProyectoController::class,'update']);

//-----------------------------------------------------------------------------------------//
//--------------- RUTAS PARA API CRUD DE CADA TABLA ---------------------------------------//
//-----------------------------------------------------------------------------------------//
//Las llamadas tipo Patch / put enviadas en formato url_encoded seguiran siendo recibidas.
Route::apiResource('alumnos','AlumnoController');
Route::apiResource('ciclos','CicloController');
Route::apiResource('ciclo_modulos','CicloModuloController');
Route::apiResource('docentes','DocenteController');
Route::apiResource('docente_imparte_modulos','DocenteImparteModuloController');
//Route::apiResource('doc_generals','DocGeneralController');
Route::apiResource('documentos','DocumentoController');
Route::apiResource('documentos_proyectos','DocumentosProyectoController');
Route::apiResource('fechas','FechaController');
Route::apiResource('grupo_rubricas','GrupoRubricaController');
Route::apiResource('modulos','ModuloController');
Route::apiResource('modulos_matriculados','ModulosMatriculadoController');
Route::apiResource('proyectos','ProyectoController');
Route::apiResource('rubricas','RubricaController');
Route::apiResource('tipo_proyecto_ciclos','TipoProyectoCicloController');
Route::apiResource('tipo_proyectos','TipoProyectoController');
Route::apiResource('tutor_evalua_proyectos','TutorEvaluaProyectoController');
Route::apiResource('proyectos_propuestos','ProyectosPropuestoController');
Route::apiResource('docente_tut_colectivo_ciclos','DocenteTutColectivoCicloController');
Route::apiResource('estados_proyectos','EstadosProyectoController');
Route::get('/parametros',[ParametroController::class,'index']);
Route::post('/parametros',[ParametroController::class,'update']);
//-----------------------------------------------------------------------------------------//

//-------------------------OTRAS RUTAS---------------------------------//
Route::get('/docentes/search/{value}',[DocenteController::class,'search']);
Route::get('/docentes/filter/{activo}/{value}',[DocenteController::class,'filter2']); //value=parte/todo de nombre o apellido, dni o email.
Route::get('/docentes/filter/{activo}',[DocenteController::class,'filter']);
Route::post('/docentesCarga',[DocenteController::class,'altaDocente']);
Route::get('/docentes_modulos_tutoriascolectivas',[DocenteController::class,'docentes_modulos_tutoriascolectivas']);
Route::get('/docentes_modulos_tutoriascolectivas_tutindiv/{docente_id}',[DocenteController::class,'docentes_modulos_tutoriascolectivas_tutindiv_por_docente']);
Route::post('/docentesAltaIndividual',[DocenteController::class,'altaIndividualDocente']);
Route::post('/alumnos_email',[AlumnoController::class,'emailSearch']);
Route::post('/docentes_email',[DocenteController::class,'emailSearch']);
Route::get('fechas_envio/{curso}',[FechaController::class,'liveSend']);
Route::get('/alumnos/search/{value}',[AlumnoController::class,'search']);
Route::get('/alumnos/filter/{activo}/{value}',[AlumnoController::class,'filter2']);
Route::get('/alumnos/filter/{activo}',[AlumnoController::class,'filter']);
Route::get('/alumnosConProyectos',[AlumnoController::class,'conProyectos']);
Route::post('/alumnosMatricula',[AlumnoController::class,'altaAlumno']);
Route::get('/alumnosBorra/{id}',[AlumnoController::class,'borraAlumno']);
Route::post('/alumnosAltaIndividual',[AlumnoController::class,'altaIndividualAlumno']);
Route::get('proyectos_propuestos/{ciclo}/{leido}/{return}',[ProyectosPropuestoController::class,'search']);  //$ciclo: ciclo_id -1 si todos. leido: 0 (no leidos) ,1 (todos). return todo/cuenta.
Route::get('/tut_colectivo_ciclos_proyectos/{docente}/{curso}',[DocenteTutColectivoCicloController::class,'search2']);  //Devuelve docente junto con los ciclos que tutoriza colectivamente
Route::get('/docente_tut_colectivo_ciclos/{curso}/{ciclo_id}',[DocenteTutColectivoCicloController::class,'searchciclocurso']);  //Devuelve docente junto con los ciclos que tutoriza colectivamente
Route::get('/docente_imparte_modulos/docente/{docente_id}/{curso}',[DocenteImparteModuloController::class,'searchDocente']);  //Devuelve docente junto con los ciclos que tutoriza colectivamente
Route::get('/proyectos/search/{value}',[ProyectoController::class,'search']); //Busuqedas de cadena en el nombre
Route::get('/proyectos/alumno/{value}',[ProyectoController::class,'searchByAlumno']); //DEvuelve proyectos del alumno {value}
Route::get('/proyectosAdmin/{curso}',[ProyectoController::class,'proyectosAdmin']); //DEvuelve proyectos del curso: id,nombreProyecto,nombre+apellidos+dni alumno + ciclo (id y codigoCiclo)
Route::get('/proyectosTutIndiv/{curso}/{docente_id}',[ProyectoController::class,'proyectosTutIndiv']);
Route::get('/proyectos_full/{id}',[ProyectoController::class,'proyectos_full']); 
Route::get('/proyectos_publicos',[ProyectoController::class,'proyectos_publicos']); 
Route::get('/documentos/filter/{user}/{ciclo}',[DocumentoController::class,'filter']);
Route::get('/rubricas_con_grupos/{curso}/{ciclo}',[RubricaController::class,'rubricas_con_grupos']);
Route::get('/reset/{cursoCierre}/{cursoNuevo}/{alumnos}/{docentes}/{fechas}/{rubricas}/{curso}',[ResetController::class,'reset']);
Route::get('/ciclos_modulos_nombres',[CicloModuloController::class,'ciclos_modulos_nombres']);
Route::get('/tipos_proyecto_ciclos_con_tipos/{ciclo_id}',[TipoProyectoCicloController::class,'tipos_proyecto_ciclos_con_tipos']);

//cualquier ottra ruta será rechazada.
Route::any('/{any}', 'MezcladosController@otrasrutas')->where('any', '.*');
