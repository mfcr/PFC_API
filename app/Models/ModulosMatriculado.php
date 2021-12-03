<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModulosMatriculado extends Model
{
    use HasFactory;
    protected $fillable = ['proyecto_id','ciclo_modulo_id','preevaluado','estado','comentario'];
    protected $casts = ['proyecto_id' => 'integer','ciclo_modulo_id'=>'integer','preevaluado'=>'boolean'];

    public $timestamps=false;

    public function proyectos () {
        return $this->belongsTo(Proyecto::class,'proyecto_id','id');
    }

    public function ciclo_modulos() {
        return $this->belongsTo(CicloModulo::class,'ciclo_modulo_id','id');
    }

    public function modulos () {
    	return $this->hasOneThrough(Modulo::class,CicloModulo::class,'id','id','ciclo_modulo_id','modulo_id');
    }
    public function ciclos () {
        return $this->hasOneThrough(Ciclo::class,CicloModulo::class,'id','id','ciclo_modulo_id','ciclo_id');
    }


 }
