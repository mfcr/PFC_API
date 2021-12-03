<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rubrica extends Model
{
    use HasFactory;
    protected $fillable = ['curso','ciclo_id','grupo_rubrica_id','rubrica','descExcelente','descBien','descRegular','descInsuficiente','porcentaje'];
    protected $casts = ['curso' => 'integer','ciclo_id'=>'integer','grupo_rubrica_id'=>'integer','porcentaje'=>'float'];
    public $timestamps=false;

    public function grupo_rubricas () {
    	return $this->belongsTo(GrupoRubrica::class,'grupo_rubrica_id','id');
    }
    public function ciclos () {
    	return $this->belongsTo(Ciclo::class,'ciclo_id','id');
    }
    public function tutor_evalua_proyectos () {
    	return $this->hasMany(TutorEvaluaProyecto::class,'rubrica_id');
    }

}
