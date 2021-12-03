<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoProyectoCiclo extends Model
{
    use HasFactory;
    protected $fillable = ['ciclo_id','tipo_proyecto_id'];
    protected $casts = ['ciclo_id' => 'integer','tipo_proyecto_id'=>'integer'];
    public $timestamps=false;

    public function tipo_proyectos () {
    	return $this->belongsTo(TipoProyecto::class,'tipo_proyecto_id','id');
    }
    public function ciclos () {
        return $this->belongsTo(Ciclo::class,'ciclo_id','id');
    }


}
