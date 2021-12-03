<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadosProyecto extends Model
{
    use HasFactory;
    protected $fillable = ['estado','codigo'];
    public $timestamps=false;

    public function proyectos () {
    	return $this->hasMany(Proyecto::class,'estado');
    }


}
