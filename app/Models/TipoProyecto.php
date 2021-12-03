<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoProyecto extends Model
{
    use HasFactory;
    protected $fillable = ['tipo'];
    public $timestamps=false;

    public function tipo_proyecto_ciclos () {
    	return $this->hasMany(TipoProyectoCiclo::class,'tipo_proyecto_id');
    }
    public function proyectos () {
        return $this->hasMany(Proyecto::class,'tipo_proyecto_id');
    }
    public function ciclos() {
        return $this->belongsToMany(Ciclo::class,TipoProyectoCiclo::class,'tipo_proyecto_id','ciclo_id');
    }


}
