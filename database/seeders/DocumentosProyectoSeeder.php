<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Proyecto;
use App\Models\DocumentosProyecto;

class DocumentosProyectoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//solo los proyectos con id>4 tienen documentos
    	$tipos=['Proyecto Completo','Memoria','Imagen','Video','Anexo','Codigo','Otros'];
    	$proy=Proyecto::where('id','>',4)->get();
    	foreach ($proy as $p) {
    		for ($x=0;$x<rand(2,7);$x++) { //cada proyecto entre 2 y 7 documentos.
    			$nuevo=new Documentosproyecto();
    			$nuevo->proyecto_id=$p->id;
    			$nuevo->tipoDocumento=$tipos[rand(0,sizeof($tipos)-1)];
    			$nuevo->descripcion='Documento numero '.($x+1).' del proyecto '.$p->id.'. Tipo: '.$nuevo->tipoDocumento;
    			$nuevo->UriDocumento='Uri del documento '.($x+1).' del proyecto '.$p->id;
    			$nuevo->isFile=rand(0,1);
    			$nuevo->save();
    		}
    	}

    }
}
