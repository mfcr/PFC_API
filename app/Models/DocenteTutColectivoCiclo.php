<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocenteTutColectivoCiclo extends Model
{
    use HasFactory;
    protected $fillable = ['docente_id','ciclo_id','curso'];
    protected $casts = ['docente_id' => 'integer','ciclo_id'=>'integer','curso'=>'integer'];
    protected $table = 'docente_tut_colectivo_ciclos';
    public $timestamps=false;

    public function docentes () {
    	return $this->belongsTo(Docente::class,'docente_id','id');
    }
    public function ciclos () {
    	return $this->belongsTo(Ciclo::class,'ciclo_id','id');
    }

}
