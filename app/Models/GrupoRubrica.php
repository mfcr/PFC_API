<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoRubrica extends Model
{
    use HasFactory;
    protected $fillable = ['grupo'];
    public $timestamps=false;

    public function rubricas () {
    	return $this->hasMany(Rubrica::class,'grupo_rubrica_id');
    }

}
