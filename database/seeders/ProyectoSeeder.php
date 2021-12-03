<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Proyecto;
use App\Models\Docente;
use App\Models\Alumno;
use App\Models\Ciclo;


class ProyectoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $alumnos=Alumno::all();
        $ciclos=Ciclo::all();
    //Creacion de un proyecto vacio (cuando se da de alta al alumno) id=1
    	$al=$alumnos[rand(0,sizeof($alumnos)-1)]; //escogemos un alumno al azar.
    	$ci=$ciclos[rand(0,sizeof($ciclos)-1)]; //escogemos un ciclo al azar.

    	$nuevo=new Proyecto();
       	$nuevo->curso=2021;
       	$nuevo->ciclo_id=$ci->id;
       	$nuevo->alumno_id=$al->id;
    	//$nuevo->docente_id=Docente::inRandomOrder()->first()->id;
    	$nuevo->estado=1; //Pdte de definir estados
    	$nuevo->notaPrevia=null;
    	$nuevo->comentarioPrevio=null;
    	$nuevo->notaFinal=null;
    	$nuevo->nombreProyecto=null;
    	$nuevo->tipo_proyecto_id=null;
    	$nuevo->descTipo=null;
    	$nuevo->textoPropuestaProyecto=null;
    	$nuevo->textoRequisitosFuncionales=null;
		$nuevo->textoModulosRelacionados=null;    	
		$nuevo->save();

    //Creacion con un docente asignado como tutor individual id=2
    	$p=Proyecto::where('ciclo_id',$ci->id)->where('alumno_id',$al->id)->get(); //No null
    	while (sizeof($p)>0) {
	    	$al=$alumnos[rand(0,sizeof($alumnos)-1)]; //escogemos un alumno al azar.
	    	$ci=$ciclos[rand(0,sizeof($ciclos)-1)]; //escogemos un ciclo al azar.
			$p=Proyecto::where('ciclo_id',$ci->id)->where('alumno_id',$al->id)->get(); //si coincide alumno y ciclo tendra tamaño 1 si no 0 ->sale del bucle
    	}
    	$nuevo=new Proyecto();
       	$nuevo->curso=2021;
       	$nuevo->ciclo_id=$ci->id;
       	$nuevo->alumno_id=$al->id;
    	$nuevo->docente_id=Docente::inRandomOrder()->first()->id;
    	$nuevo->estado=1; //Pdte de definir estados
    	$nuevo->notaPrevia=null;
    	$nuevo->comentarioPrevio=null;
    	$nuevo->notaFinal=null;
    	$nuevo->nombreProyecto=null;
    	$nuevo->tipo_proyecto_id=null;
    	$nuevo->descTipo=null;
    	$nuevo->textoPropuestaProyecto=null;
    	$nuevo->textoRequisitosFuncionales=null;
		$nuevo->textoModulosRelacionados=null;    	
		$nuevo->save();
    //Proyecto con docente asignado y anteproyecto presentado. Pendiente de preevaluar. ID=3
    	$p=Proyecto::where('ciclo_id',$ci->id)->where('alumno_id',$al->id)->get(); //No null
    	while (sizeof($p)>0) {
	    	$al=$alumnos[rand(0,sizeof($alumnos)-1)]; //escogemos un alumno al azar.
	    	$ci=$ciclos[rand(0,sizeof($ciclos)-1)]; //escogemos un ciclo al azar.
			$p=Proyecto::where('ciclo_id',$ci->id)->where('alumno_id',$al->id)->get(); //si coincide alumno y ciclo tendra tamaño 1 si no 0 ->sale del bucle
    	}
    	$nuevo=new Proyecto();
       	$nuevo->curso=2021;
       	$nuevo->ciclo_id=$ci->id;
       	$nuevo->alumno_id=$al->id;
    	$nuevo->docente_id=Docente::inRandomOrder()->first()->id;
    	$nuevo->estado=2; //Pdte de definir estados
    	$nuevo->notaPrevia=null;
    	$nuevo->comentarioPrevio=null;
    	$nuevo->notaFinal=null;
    	$nuevo->nombreProyecto='Proyecto con id 3';
    	$nuevo->tipo_proyecto_id=2;
    	$nuevo->descTipo=null;
    	$nuevo->textoPropuestaProyecto='Aqui una descripcion muy larga del proyecto con id 3';
    	$nuevo->textoRequisitosFuncionales='Aqui una descripcion muy larga de los requisitos funcionales del proyecto con id 3';
		$nuevo->textoModulosRelacionados='Aqui aclaraciones de la situacion los módulos del ciclo, en cjto con los datos de detalleMatricula, proyecto con id 3';    	
		$nuevo->save();

    //Idem anterior y con docentes de los modulos apto/no apto id=4
    	$p=Proyecto::where('ciclo_id',$ci->id)->where('alumno_id',$al->id)->get(); //No null
    	while (sizeof($p)>0) {
	    	$al=$alumnos[rand(0,sizeof($alumnos)-1)]; //escogemos un alumno al azar.
	    	$ci=$ciclos[rand(0,sizeof($ciclos)-1)]; //escogemos un ciclo al azar.
			$p=Proyecto::where('ciclo_id',$ci->id)->where('alumno_id',$al->id)->get(); //si coincide alumno y ciclo tendra tamaño 1 si no 0 ->sale del bucle
    	}
    	$nuevo=new Proyecto();
       	$nuevo->curso=2021;
       	$nuevo->ciclo_id=$ci->id;
       	$nuevo->alumno_id=$al->id;
    	$nuevo->docente_id=Docente::inRandomOrder()->first()->id;
    	$nuevo->estado=2; //Pdte de definir estados
    	$nuevo->notaPrevia=null;
    	$nuevo->comentarioPrevio=null;
    	$nuevo->notaFinal=null;
    	$nuevo->nombreProyecto='Proyecto con id 4';
    	$nuevo->tipo_proyecto_id=1;
    	$nuevo->descTipo=null;
    	$nuevo->textoPropuestaProyecto='Aqui una descripcion muy larga del proyecto con id 4';
    	$nuevo->textoRequisitosFuncionales='Aqui una descripcion muy larga de los requisitos funcionales del proyecto con id 4';
		$nuevo->textoModulosRelacionados='Aqui aclaraciones de la situacion los módulos del ciclo, en cjto con los datos de detalleMatricula, proyecto con id 4';    	
		$nuevo->save();
    //Idem anterior pero solo con parte preevaluada id=5
    	$p=Proyecto::where('ciclo_id',$ci->id)->where('alumno_id',$al->id)->get(); //No null
    	while (sizeof($p)>0) {
	    	$al=$alumnos[rand(0,sizeof($alumnos)-1)]; //escogemos un alumno al azar.
	    	$ci=$ciclos[rand(0,sizeof($ciclos)-1)]; //escogemos un ciclo al azar.
			$p=Proyecto::where('ciclo_id',$ci->id)->where('alumno_id',$al->id)->get(); //si coincide alumno y ciclo tendra tamaño 1 si no 0 ->sale del bucle
    	}
    	$nuevo=new Proyecto();
       	$nuevo->curso=2021;
       	$nuevo->ciclo_id=$ci->id;
       	$nuevo->alumno_id=$al->id;
    	$nuevo->docente_id=Docente::inRandomOrder()->first()->id;
    	$nuevo->estado=2; //Pdte de definir estados 
    	$nuevo->notaPrevia=null;
    	$nuevo->comentarioPrevio=null;
    	$nuevo->notaFinal=null;
    	$nuevo->nombreProyecto='Proyecto con id 5';
    	$nuevo->tipo_proyecto_id=3;
    	$nuevo->descTipo='Pdte decision';
    	$nuevo->textoPropuestaProyecto='Aqui una descripcion muy larga del proyecto con id 5';
    	$nuevo->textoRequisitosFuncionales='Aqui una descripcion muy larga de los requisitos funcionales del proyecto con id 5';
		$nuevo->textoModulosRelacionados='Aqui aclaraciones de la situacion los módulos del ciclo, en cjto con los datos de detalleMatricula, proyecto con id 5';    	
		$nuevo->save();
    //Proyecto con proyecto aprobado, presentado documenttos (Introducir en tablas) id=6
    	$p=Proyecto::where('ciclo_id',$ci->id)->where('alumno_id',$al->id)->get(); //No null
    	while (sizeof($p)>0) {
	    	$al=$alumnos[rand(0,sizeof($alumnos)-1)]; //escogemos un alumno al azar.
	    	$ci=$ciclos[rand(0,sizeof($ciclos)-1)]; //escogemos un ciclo al azar.
			$p=Proyecto::where('ciclo_id',$ci->id)->where('alumno_id',$al->id)->get(); //si coincide alumno y ciclo tendra tamaño 1 si no 0 ->sale del bucle
    	}
    	$nuevo=new Proyecto();
       	$nuevo->curso=2021;
       	$nuevo->ciclo_id=$ci->id;
       	$nuevo->alumno_id=$al->id;
    	$nuevo->docente_id=Docente::inRandomOrder()->first()->id;
    	$nuevo->estado=3; //Pdte de definir estados
    	$nuevo->notaPrevia=null;
    	$nuevo->comentarioPrevio=null;
    	$nuevo->notaFinal=null;
    	$nuevo->nombreProyecto='Proyecto con id 6';
    	$nuevo->tipo_proyecto_id=1;
    	$nuevo->descTipo=null;
    	$nuevo->textoPropuestaProyecto='Aqui una descripcion muy larga del proyecto con id 6';
    	$nuevo->textoRequisitosFuncionales='Aqui una descripcion muy larga de los requisitos funcionales del proyecto con id 6';
		$nuevo->textoModulosRelacionados='Aqui aclaraciones de la situacion los módulos del ciclo, en cjto con los datos de detalleMatricula, proyecto con id 6';    	
		$nuevo->save();
    //Proyecto con proyecto aprobado, presentado documenttos (Introducir en tablas) y tutor individual ya ha evaluado id=7
    	$p=Proyecto::where('ciclo_id',$ci->id)->where('alumno_id',$al->id)->get(); //No null
    	while (sizeof($p)>0) {
	    	$al=$alumnos[rand(0,sizeof($alumnos)-1)]; //escogemos un alumno al azar.
	    	$ci=$ciclos[rand(0,sizeof($ciclos)-1)]; //escogemos un ciclo al azar.
			$p=Proyecto::where('ciclo_id',$ci->id)->where('alumno_id',$al->id)->get(); //si coincide alumno y ciclo tendra tamaño 1 si no 0 ->sale del bucle
    	}
    	$nuevo=new Proyecto();
       	$nuevo->curso=2021;
       	$nuevo->ciclo_id=$ci->id;
       	$nuevo->alumno_id=$al->id;
    	$nuevo->docente_id=Docente::inRandomOrder()->first()->id;
    	$nuevo->estado=3; //Pdte de definir estados
    	$nuevo->notaPrevia=6;
    	$nuevo->comentarioPrevio='Puedes aprobar si mejoras los aspectos estéticos';
    	$nuevo->notaFinal=null;
    	$nuevo->nombreProyecto='Proyecto con id 7';
    	$nuevo->tipo_proyecto_id=2;
    	$nuevo->descTipo=null;
    	$nuevo->textoPropuestaProyecto='Aqui una descripcion muy larga del proyecto con id 7';
    	$nuevo->textoRequisitosFuncionales='Aqui una descripcion muy larga de los requisitos funcionales del proyecto con id 7';
		$nuevo->textoModulosRelacionados='Aqui aclaraciones de la situacion los módulos del ciclo, en cjto con los datos de detalleMatricula, proyecto con id 7';    	
		$nuevo->save();
    //Proyecto con proyecto aprobado, presentado documenttos (Introducir en tablas) y ambos tutores individual ya han evaluado id=8
    	$p=Proyecto::where('ciclo_id',$ci->id)->where('alumno_id',$al->id)->get(); //No null
    	while (sizeof($p)>0) {
	    	$al=$alumnos[rand(0,sizeof($alumnos)-1)]; //escogemos un alumno al azar.
	    	$ci=$ciclos[rand(0,sizeof($ciclos)-1)]; //escogemos un ciclo al azar.
			$p=Proyecto::where('ciclo_id',$ci->id)->where('alumno_id',$al->id)->get(); //si coincide alumno y ciclo tendra tamaño 1 si no 0 ->sale del bucle
    	}
    	$nuevo=new Proyecto();
       	$nuevo->curso=2021;
       	$nuevo->ciclo_id=$ci->id;
       	$nuevo->alumno_id=$al->id;
    	$nuevo->docente_id=Docente::inRandomOrder()->first()->id;
    	$nuevo->estado=4; //Pdte de definir estados
    	$nuevo->notaPrevia=7;
    	$nuevo->comentarioPrevio='Puedes aprobar si mejoras los aspectos técnicos';
    	$nuevo->notaFinal=7;
    	$nuevo->nombreProyecto='Proyecto con id 8';
    	$nuevo->tipo_proyecto_id=2;
    	$nuevo->descTipo=null;
    	$nuevo->textoPropuestaProyecto='Aqui una descripcion muy larga del proyecto con id 8';
    	$nuevo->textoRequisitosFuncionales='Aqui una descripcion muy larga de los requisitos funcionales del proyecto con id 8';
		$nuevo->textoModulosRelacionados='Aqui aclaraciones de la situacion los módulos del ciclo, en cjto con los datos de detalleMatricula, proyecto con id 8';    	
		$nuevo->save();
    //Idem anterior y publicable id=9
    	$p=Proyecto::where('ciclo_id',$ci->id)->where('alumno_id',$al->id)->get(); //No null
    	while (sizeof($p)>0) {
	    	$al=$alumnos[rand(0,sizeof($alumnos)-1)]; //escogemos un alumno al azar.
	    	$ci=$ciclos[rand(0,sizeof($ciclos)-1)]; //escogemos un ciclo al azar.
			$p=Proyecto::where('ciclo_id',$ci->id)->where('alumno_id',$al->id)->get(); //si coincide alumno y ciclo tendra tamaño 1 si no 0 ->sale del bucle
    	}
    	$nuevo=new Proyecto();
       	$nuevo->curso=2021;
       	$nuevo->ciclo_id=$ci->id;
       	$nuevo->alumno_id=$al->id;
    	$nuevo->docente_id=Docente::inRandomOrder()->first()->id;
    	$nuevo->estado=4; //Pdte de definir estados 
    	$nuevo->notaPrevia=5;
    	$nuevo->comentarioPrevio='Puedes aprobar si mejoras los aspectos estéticos y técnicos';
    	$nuevo->notaFinal=6;
    	$nuevo->nombreProyecto='Proyecto con id 9';
    	$nuevo->tipo_proyecto_id=3;
    	$nuevo->descTipo='IOT sensores';
    	$nuevo->textoPropuestaProyecto='Aqui una descripcion muy larga del proyecto con id 9';
    	$nuevo->textoRequisitosFuncionales='Aqui una descripcion muy larga de los requisitos funcionales del proyecto con id 9';
		$nuevo->textoModulosRelacionados='Aqui aclaraciones de la situacion los módulos del ciclo, en cjto con los datos de detalleMatricula, proyecto con id 9';    	
		$nuevo->save();


    }
}
