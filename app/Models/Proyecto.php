<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;
    protected $fillable = ['alumno_id','ciclo_id','docente_id','curso','estado','notaPrevia','comentarioPrevio','NotaFinal',
                           'nombreProyecto','tipo_proyecto_id','descTipo','textoPropuestaProyecto','textoRequisitosFuncionales','textoModulosRelacionados'];
    protected $casts = ['alumno_id' => 'integer','ciclo_id'=>'integer','curso'=>'integer','docente_id' => 'integer','estado'=>'integer',
            'tipo_proyecto_id'=>'integer','notaPrevia'=>'integer','NotaFinal'=>'integer'];
    public $timestamps=false;

    public function documentos_proyectos () {
    	return $this->hasMany(DocumentosProyecto::class,'proyecto_id');
    }
    public function modulos_matriculados () {
    	return $this->hasMany(ModulosMatriculado::class,'proyecto_id');
    }
    public function tutor_evalua_proyectos () {
    	return $this->hasMany(TutorEvaluaProyecto::class,'proyecto_id');
    }
    public function docentes () { 
    	return $this->belongsTo(Docente::class,'docente_id','id');
    }
    public function tipo_proyectos () {
        return $this->belongsTo(TipoProyecto::class,'tipo_proyecto_id','id');
    }
    public function alumnos () {
        return $this->belongsTo(Alumno::class,'alumno_id','id');
    }
    public function ciclos () {
        return $this->belongsTo(Ciclo::class,'ciclo_id','id');
    }
    public function estados () {
        return $this->belongsTo(EstadosProyecto::class,'estado','codigo');
    }
    

}
