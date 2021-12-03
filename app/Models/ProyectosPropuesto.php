<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProyectosPropuesto extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','email','ciclo_id','propuesta','leido'];
    protected $casts = ['ciclo_id' => 'integer','leido'=>'boolean'];

    public function ciclos () {
    	return $this->belongsTo(Ciclo::class,'ciclo_id','id');
    }



}
