<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CicloModulo extends Model
{
    use HasFactory;
    protected $fillable = ['ciclo_id','modulo_id'];
    protected $casts = ['ciclo_id' => 'integer','modulo_id'=>'integer'];
    public $timestamps=false;

    public function modulos () {
    	return $this->belongsTo(Modulo::class,'modulo_id','id');
    }
    public function ciclos () {
    	return $this->belongsTo(Ciclo::class,'ciclo_id','id');
    }
    public function docente_imparte_modulos() {
        return $this->HasMany(DocenteImparteModulo::class,'ciclo_modulo_id','id');
    }
    public function modulos_matriculados() {
        return $this->HasMany(ModulosMatriculado::class,'ciclo_modulo_id','id');
    }
    public function docentes() {
        return $this->belongsToMany(Docente::class,DocenteImparteModulo::class,'ciclo_modulo_id','docente_id');
    }


}
