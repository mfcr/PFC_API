<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TutorEvaluaProyecto extends Model
{
    use HasFactory;
    protected $fillable = ['proyecto_id','docente_id','rubrica_id','nota','comentario','esColectivo'];
    protected $casts = ['proyecto_id' => 'integer','docente_id'=>'integer','rubrica_id'=>'integer','nota'=>'integer','esColectivo'=>'boolean'];
    public $timestamps=false;

    public function rubricas () {
    	return $this->belongsTo(Rubrica::class,'rubrica_id','id');
    }
    public function docentes () {
    	return $this->belongsTo(Docente::class,'docente_id','id');
    }
    public function proyectos () {
    	return $this->belongsTo(Proyecto::class,'proyecto_id','id');
    }

}
