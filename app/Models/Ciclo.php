<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciclo extends Model
{
    use HasFactory;
    protected $fillable = ['id','codigoCiclo','nombreCiclo','descripcion','distancia'];
    protected $casts = ['distancia' => 'boolean'];
    public $timestamps=false;

    public function documentos () {
        return $this->hasMany(Documento::class,'ciclo_id');
    }
    public function docente_tut_colectivo_ciclos () {
        return $this->hasMany(DocenteTutColectivoCiclo::class,'ciclo_id');
    }
    public function ciclo_modulos () {
        return $this->hasMany(CicloModulo::class,'ciclo_id');
    }
    public function proyectos () {
        return $this->hasMany(Proyecto::class,'ciclo_id');
    }
    public function rubricas () {
        return $this->hasMany(Rubrica::class,'ciclo_id');
    }
    public function tipo_proyecto_ciclos() {
        return $this->hasMany(TipoProyectoCiclo::class,'ciclo_id');   
    }
    public function proyectos_propuestos() {
        return $this->hasMany(ProyectosPropuesto::class,'ciclo_id');   
    }

    public function tipo_proyectos() {
        return $this->belongsToMany(TipoProyecto::class,TipoProyectoModulo::class,'ciclo_id','tipo_proyecto_id');
    }
    public function modulos() {
        return $this->belongsToMany(Modulo::class,CicloModulo::class,'ciclo_id','modulo_id');
    }
    public function tut_colectivo_docentes() {
        return $this->belongsToMany(Docente::class,DocenteTutColectivoCiclo::class,'ciclo_id','docente_id');
    }



}
