<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocenteImparteModulo extends Model
{
    use HasFactory;
    protected $fillable = ['docente_id','ciclo_modulo_id','curso'];
    protected $casts = ['docente_id' => 'integer','ciclo_modulo_id'=>'integer','curso'=>'integer'];


    public $timestamps=false;
    public function docentes () {
    	return $this->belongsTo(Docente::class,'docente_id','id');
    }
    public function ciclo_modulos() {
        return $this->belongsTo(CicloModulo::class,'ciclo_modulo_id','id');
    }


    public function modulos () {
    	return $this->hasOneThrough(Modulo::class,CicloModulo::class,'id','id','ciclo_modulo_id','modulo_id');
    }

    public function ciclos () {
        return $this->hasOneThrough(Ciclo::class,CicloModulo::class,'id','id','ciclo_modulo_id','ciclo_id');
        //Parametros: claseDestino,ClaseIntermedia,FK clase intermedia (destino del enlace), FK clase destino (destino del enlace), origendel enlace con tabla intermedia desde inicial, origen del enlace de tabla intermedia con destino.
    }
}
