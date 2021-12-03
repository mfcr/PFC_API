<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\Docente;
use App\Models\Fecha;
use App\Models\Rubrica;
use App\Models\Parametro;


class ResetController extends Controller
{
	//Recibe la llamada de reset y en funcion de las opciones elegidas, realiza los cambios.



	public function reset($cursoCierre,$cursoNuevo,$alumnos,$docentes,$fechas,$rubricas,$curso) {
		$resultado=201;
		$error='';
		if ($docentes) {
			if (Docente::where('activo',true)->count()>0) {
			    $r=Docente::where('id','>',0)->update(['activo'=>false]);
	        	if(!$r) { $error=$error.'No se han cambiado docentes. '; $resultado=400; }
	        }
        }
		if ($alumnos) {
			if (Alumno::where('activo',true)->count()>0) {
			    $r=Alumno::where('id','>',0)->update(['activo'=>false]);
	        	if(!$r) { $error=$error.'No se han cambiado docentes. '; $resultado=400; }
	        }
        }
		if ($fechas) {
		    $fecha=Fecha::where('curso',$cursoCierre)->get();
		    foreach ($fecha as $f) {
		    	$nuevaFecha = $f->replicate();
		    	$nuevaFecha->fechaLimite=($nuevaFecha->fechaLimite)->addYear();  
		    	$nuevaFecha->curso=$cursoNuevo;
		    	$r=$nuevaFecha->save();
		    	if(!$r) { $error=$error.'Error modificando fechas. '; $resultado=400; }
		    }
        }
		if ($rubricas) {
		    $rubrica=Rubrica::where('curso',$cursoCierre)->get();
		    foreach ($rubrica as $rub) {
		    	$nuevaRubrica = $rub->replicate();
		    	$nuevaRubrica->curso=$cursoNuevo;
		    	$r=$nuevaRubrica->save();
		    	if(!$r) { $error=$error.'Error modificando rúbricas. '; $resultado=400; }
		    }
        }
		if ($curso) {
		    $params=Parametro::first();
	    	$params->cursoActual=$cursoNuevo;
	    	$r=$params->save();
	    	if(!$r) { $error=$error.'Error modificando cursoActual. '; $resultado=400; }
        }

 		if ($error='') {$error='Cambios realizados con éxito';}
 		return response()->json(['message' => $error], $resultado);

    }

}
