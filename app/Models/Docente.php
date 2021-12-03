<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;
    protected $fillable = ['email','dni','nombre','apellido1','apellido2','telefono','activo','isAdmin'];
    protected $casts = ['activo' => 'boolean','isAdmin'=>'boolean'];
    public $timestamps=false;

    //public function mensajes () {
    //	return $this->hasMany(Mensaje::class,'docente_id');
    //}
    public function tutor_evalua_proyectos () {
        return $this->hasMany(TutorEvaluaProyecto::class,'docente_id');
    }
    public function proyectos () {
        return $this->hasMany(Proyecto::class,'docente_id');
    }
    public function docente_imparte_modulos () {
        return $this->hasMany(DocenteImparteModulo::class,'docente_id');
    }
    public function docente_tut_colectivo_ciclos () {
    	return $this->hasMany(DocenteTutColectivoCiclo::class,'docente_id');
    }
    public function docente_ciclo_modulos() {
        return $this->belongsToMany(CicloModulo::class,DocenteImparteModulo::class,'docente_id','ciclo_modulo_id');
    }
    public function ciclos() {
        return $this->belongsToMany(Ciclo::class,DocenteTutColectivoCiclo::class,'docente_id','ciclo_id');
    }
    public function modulos() {
        return $this->docente_ciclo_modulos()->with('modulos');
    }


}
