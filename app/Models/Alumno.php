<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    protected $fillable = ['email','dni','nombre','apellido1','apellido2','telefono','activo'];
    protected $casts = ['activo' => 'boolean'];

    public $timestamps=false;

    //public function mensajes () {
    //	return $this->hasMany(Mensaje::class,'alumno_id');
    //}
    public function proyectos () {
    	return $this->hasMany(Proyecto::class,'alumno_id');
    }

    public function modulos_matriculados() {
    	return $this->hasManyThrough(ModulosMatriculado::class,Proyecto::class);
    }

}
