<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parametro extends Model
{
    use HasFactory;

    protected $fillable = ['cursoActual'];
    protected $casts = ['cursoActual' => 'integer'];
	protected $primaryKey = null;
    public $incrementing = false;

    public $timestamps=false;

}
