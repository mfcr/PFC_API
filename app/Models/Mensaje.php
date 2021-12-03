<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//El modelo Mensaje ha sido eliminado.

class Mensaje extends Model
{
    use HasFactory;
    protected $fillable = ['proyecto_id','alumno_id','docente_id','alum_a_tut','cabecera','cuerpo','leido'];
    protected $casts = ['proyecto_id' => 'integer','alumno_id'=>'integer','docente_id'=>'integer','alum_a_tut'=>'boolean','leido'=>'boolean'];

    public function alumnos () {
    	return $this->belongsTo(Alumno::class,'alumno_id','id');
    }
    public function docentes () {
    	return $this->belongsTo(Docente::class,'docente_id','id');
    }
    public function proyectos () {
    	return $this->belongsTo(Proyecto::class,'proyecto_id','id');
    }

}
