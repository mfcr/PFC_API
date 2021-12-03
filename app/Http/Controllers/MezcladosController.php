<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\models\Ciclo;
use App\models\CicloModulo;
use App\models\Docente;
use App\models\DocenteImparteModulo;
use App\models\DocGeneral;
use App\models\Documento;
use App\models\DocumentosProyecto;
use App\models\Fecha;
use App\models\GrupoRubrica;
use App\models\Mensaje;
use App\models\Modulo;
use App\models\ModulosMatriculado;
use App\models\Proyecto;
use App\models\Rubrica;
use App\models\TipoProyecto;
use App\models\TipoProyectoCiclo;
use App\models\TutorEvaluaProyecto;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


/*

$request->has('array_name.*');

the asteriks means all item in the array or you can do it this way if you know the key

$request->has('array_name.key_name');

but if you want to split a request you can by creating a new request object like this

$request2 = new Request([
  'key_name'=>'value',
  'another_keyname'=>'value',
]);



*/



class MezcladosController extends Controller
{


    public function otrasrutas() {
        return response()->json(['message'=>'ruta incorrecta.'],404);
    }

}
