<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fecha extends Model
{
    use HasFactory;
    protected $fillable = ['curso','nombre','diasParaAviso','descripcion','enviar','fechaLimite','enviado'];
    protected $casts = ['curso' => 'integer','diasParaAviso'=>'integer','enviar'=>'boolean','fechaLimite'=>'date:Y-m-d','enviado'=>'boolean'];

    public $timestamps=false;

}
