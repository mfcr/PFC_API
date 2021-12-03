<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    use HasFactory;
    protected $fillable = ['codigoModulo','nombreModulo','tiene_UC','curso'];
    protected $casts = ['tiene_UC'=>'boolean','curso' => 'integer'];

    public $timestamps=false;
    public function ciclo_modulos () {
    	return $this->hasMany(CicloModulo::class,'modulo_id');
    }

    public function ciclos() {
        return $this->belongsToMany(Ciclo::class,CicloModulo::class,'modulo_id','ciclo_id');
    }


    public function docente_imparte_modulos () {
        return $this->BelongsToMany(DocenteImparteModulo::class,CicloModulo::class,'modulo_id','id');
    }

    public function modulos_matriculados () {
        return $this->BelongsToMany(ModulosMatriculado::class,CicloModulo::class,'modulo_id','id');

    }
    public function docentes() {
        return $this->docente_imparte_modulos()->with('docentes');
    }


}
