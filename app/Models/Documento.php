<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use App\Traits\Enums;

class Documento extends Model
{
    use HasFactory;
    //use Enums;
    protected $fillable = ['ciclo_id','nombre','descripcion','tipo','uri','isFile','publico'];
    protected $casts = ['ciclo_id' => 'integer','isFile'=>'boolean','publico'=>'boolean'];
    //protected $enumTipos=['Recursos útiles','Información general','Legislación','Programas','Otros']; 

    public function ciclos () {
    	return $this->belongsTo(Ciclo::class,'ciclo_id','id');
    }

}
