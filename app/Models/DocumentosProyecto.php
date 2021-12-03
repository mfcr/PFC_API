<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use App\Traits\Enums;

class DocumentosProyecto extends Model
{
    use HasFactory;
    //use Enums;
    protected $fillable = ['proyecto_id','tipoDocumento','descripcion','UriDocumento','isFile','publico'];
    protected $casts = ['proyecto_id' => 'integer','isFile'=>'boolean','publico'=>'boolean'];
	//protected $enumTipoDocumentos=['Proyecto Completo','Memoria','Imagen','Video','Anexo','Codigo','Otros']; 

    public function proyectos () {
    	return $this->belongsTo(Proyecto::class,'proyecto_id','id');
    }

}
