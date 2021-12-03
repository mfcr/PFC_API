<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Documento;

class DocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$nuevo=new Documento();
    	$nuevo->nombre='Contenidos mínimos IFC 301';
    	$nuevo->descripcion='Orden Ministerial del 2-3-12 que regula los contenidos mínimos del módulo de FP 301 bla, bla, bla';
    	$nuevo->tipo='Legislación';
    	$nuevo->ciclo_id=1;
    	//$nuevo->uri='pendiente definicion de como hacerlo.';
    	$nuevo->isFile=rand(0,1);
    	$nuevo->save();
    	$nuevo=new Documento();
    	$nuevo->nombre='Asignaturas del módulo';
    	$nuevo->descripcion='Orden Ministerial del 2-3-12 que regula los contenidos mínimos del módulo de FP 301 bla, bla, bla';
    	$nuevo->tipo='Información general';
    	$nuevo->ciclo_id=1;
    	//$nuevo->uri='pendiente definicion de como hacerlo.';
    	$nuevo->isFile=rand(0,1);
    	$nuevo->save();
    	$nuevo=new Documento();
    	$nuevo->nombre='Horario y Calendario de exámenes 2021';
    	$nuevo->descripcion='Orden Ministerial del 2-3-12 que regula los contenidos mínimos del módulo de FP 301 bla, bla, bla';
    	$nuevo->tipo='Recursos útiles';
    	$nuevo->ciclo_id=1;
    	//$nuevo->uri='imagen o pdf';
    	$nuevo->isFile=rand(0,1);
    	$nuevo->save();

    	$nuevo=new Documento();
    	$nuevo->nombre='Contenidos mínimos IFC 301';
    	$nuevo->descripcion='Orden Ministerial del 2-3-12 que regula los contenidos mínimos del módulo de FP 301 bla, bla, bla';
    	$nuevo->tipo='Legislación';
    	$nuevo->ciclo_id=2;
    	//$nuevo->uri='pendiente definicion de como hacerlo.';
    	$nuevo->isFile=rand(0,1);
    	$nuevo->save();
    	$nuevo=new Documento();
    	$nuevo->nombre='Asignaturas del módulo';
    	$nuevo->descripcion='Orden Ministerial del 2-3-12 que regula los contenidos mínimos del módulo de FP 301 bla, bla, bla';
    	$nuevo->tipo='Información general';
    	$nuevo->ciclo_id=2;
    	//$nuevo->uri='pendiente definicion de como hacerlo.';
    	$nuevo->isFile=rand(0,1);
    	$nuevo->save();
    	$nuevo=new Documento();
    	$nuevo->nombre='Horario y Calendario de exámenes 2021';
    	$nuevo->descripcion='Orden Ministerial del 2-3-12 que regula los contenidos mínimos del módulo de FP 301 bla, bla, bla';
    	$nuevo->tipo='Recursos útiles';
    	$nuevo->ciclo_id=2;
    	//$nuevo->uri='imagen o pdf';
    	$nuevo->isFile=rand(0,1);
    	$nuevo->save();

    	$nuevo=new Documento();
    	$nuevo->nombre='Contenidos mínimos IFC 302';
    	$nuevo->descripcion='Orden Ministerial del 2-3-12 que regula los contenidos mínimos del módulo de FP 302 bla, bla, bla';
    	$nuevo->tipo='Legislación';
    	$nuevo->ciclo_id=3;
    	//$nuevo->uri='pendiente definicion de como hacerlo.';
    	$nuevo->isFile=rand(0,1);
    	$nuevo->save();
    	$nuevo=new Documento();
    	$nuevo->nombre='Asignaturas del módulo y programaciones didácticas';
    	$nuevo->descripcion='Orden Ministerial del 2-3-12 que regula los contenidos mínimos del módulo de FP 301 bla, bla, bla';
    	$nuevo->tipo='Información general';
    	$nuevo->ciclo_id=3;
    	//$nuevo->uri='pendiente definicion de como hacerlo.';
    	$nuevo->isFile=rand(0,1);
    	$nuevo->save();
    	$nuevo=new Documento();
    	$nuevo->nombre='Horario y Calendario de exámenes 2021';
    	$nuevo->descripcion='Orden Ministerial del 2-3-12 que regula los contenidos mínimos del módulo de FP 301 bla, bla, bla';
    	$nuevo->tipo='Recursos útiles';
    	$nuevo->ciclo_id=3;
    	//$nuevo->uri='imagen o pdf';
    	$nuevo->isFile=rand(0,1);
    	$nuevo->save();

    	$nuevo=new Documento();
    	$nuevo->nombre='Contenidos mínimos IFC 302';
    	$nuevo->descripcion='Orden Ministerial del 2-3-12 que regula los contenidos mínimos del módulo de FP 302 bla, bla, bla';
    	$nuevo->tipo='Legislación';
    	$nuevo->ciclo_id=4;
    	//$nuevo->uri='pendiente definicion de como hacerlo.';
    	$nuevo->isFile=rand(0,1);
    	$nuevo->save();
    	$nuevo=new Documento();
    	$nuevo->nombre='Asignaturas del módulo';
    	$nuevo->descripcion='Orden Ministerial del 2-3-12 que regula los contenidos mínimos del módulo de FP 301 bla, bla, bla';
    	$nuevo->tipo='Información general';
    	$nuevo->ciclo_id=4;
    	//$nuevo->uri='pendiente definicion de como hacerlo.';
    	$nuevo->isFile=rand(0,1);
    	$nuevo->save();
    	$nuevo=new Documento();
    	$nuevo->nombre='Horario y Calendario de exámenes 2021';
    	$nuevo->descripcion='Orden Ministerial del 2-3-12 que regula los contenidos mínimos del módulo de FP 301 bla, bla, bla';
    	$nuevo->tipo='Recursos útiles';
    	$nuevo->ciclo_id=4;
    	//$nuevo->uri='imagen o pdf';
    	$nuevo->isFile=rand(0,1);
    	$nuevo->save();

    	$nuevo=new Documento();
    	$nuevo->nombre='Contenidos mínimos IFC 303';
    	$nuevo->descripcion='Orden Ministerial del 2-3-12 que regula los contenidos mínimos del módulo de FP 303 bla, bla, bla';
    	$nuevo->tipo='Legislación';
    	$nuevo->ciclo_id=5;
    	//$nuevo->uri='pendiente definicion de como hacerlo.';
    	$nuevo->isFile=rand(0,1);
    	$nuevo->save();
    	$nuevo=new Documento();
    	$nuevo->nombre='Asignaturas del módulo';
    	$nuevo->descripcion='Orden Ministerial del 2-3-12 que regula los contenidos mínimos del módulo de FP 301 bla, bla, bla';
    	$nuevo->tipo='Información general';
    	$nuevo->ciclo_id=5;
    	//$nuevo->uri='pendiente definicion de como hacerlo.';
    	$nuevo->isFile=rand(0,1);
    	$nuevo->save();
    	$nuevo=new Documento();
    	$nuevo->nombre='Horario y Calendario de exámenes 2021';
    	$nuevo->descripcion='Orden Ministerial del 2-3-12 que regula los contenidos mínimos del módulo de FP 301 bla, bla, bla';
    	$nuevo->tipo='Recursos útiles';
    	$nuevo->ciclo_id=5;
    	//$nuevo->uri='imagen o pdf';
    	$nuevo->isFile=rand(0,1);
    	$nuevo->save();

    	$nuevo=new Documento();
    	$nuevo->nombre='Contenidos mínimos IFC 303';
    	$nuevo->descripcion='Orden Ministerial del 2-3-12 que regula los contenidos mínimos del módulo de FP 303 bla, bla, bla';
    	$nuevo->tipo='Legislación';
    	$nuevo->ciclo_id=6;
    	//$nuevo->uri='pendiente definicion de como hacerlo.';
    	$nuevo->isFile=rand(0,1);
    	$nuevo->save();
    	$nuevo=new Documento();
    	$nuevo->nombre='Asignaturas del módulo';
    	$nuevo->descripcion='Orden Ministerial del 2-3-12 que regula los contenidos mínimos del módulo de FP 301 bla, bla, bla';
    	$nuevo->tipo='Información general';
    	$nuevo->ciclo_id=6;
    	//$nuevo->uri='pendiente definicion de como hacerlo.';
    	$nuevo->isFile=rand(0,1);
    	$nuevo->save();
    	$nuevo=new Documento();
    	$nuevo->nombre='Horario y Calendario de exámenes 2021';
    	$nuevo->descripcion='Orden Ministerial del 2-3-12 que regula los contenidos mínimos del módulo de FP 301 bla, bla, bla';
    	$nuevo->tipo='Recursos útiles';
    	$nuevo->ciclo_id=6;
    	//$nuevo->uri='imagen o pdf';
    	$nuevo->isFile=rand(0,1);
    	$nuevo->save();
//Documentso generales
        $nuevo=new Documento();
        $nuevo->nombre='Ley de Ordenación de la Educación';
        $nuevo->descripcion='La Ley Orgánica de Educación (LOE), de 3 de mayo de 2006, regula las enseñanzas educativas no universitarias en los diferentes tramos de edad. Esta ley está vigente desde el curso 2006-2007';
        $nuevo->tipo='Legislación';
        $nuevo->isFile=rand(0,1);
        //$nuevo->uri='pendiente definicion de como hacerlo.';
        $nuevo->save();
        $nuevo=new Documento();
        $nuevo->nombre='Manual del centro';
        $nuevo->descripcion='Documento de normas relativos a la convivencia del centro, incluyendo las sanciones posibles.';
        $nuevo->tipo='Información general';
        $nuevo->isFile=rand(0,1);
        //$nuevo->uri='pendiente definicion de como hacerlo.';
        $nuevo->save();
        $nuevo=new Documento();
        $nuevo->nombre='Adobe Reader';
        $nuevo->descripcion='Link de descarga del programa AdobeReader para poder abrir ficheros PDF';
        $nuevo->tipo='Programas';
        $nuevo->isFile=rand(0,1);
        $nuevo->uri='www.adobe.com';
        $nuevo->save();
        $nuevo=new Documento();
        $nuevo->nombre='Recursos utiles';
        $nuevo->descripcion='Pagina web de la Consejería de Educación del Principado de Asturias';
        $nuevo->tipo='Recursos útiles';
        $nuevo->isFile=rand(0,1);
        $nuevo->uri='www.educastur.es';
        $nuevo->save();
        $nuevo=new Documento();
        $nuevo->nombre='Noticia relativa al COVID-19';
        $nuevo->descripcion='Se puede aprovechar este campo para usarlo además de un repositorio de documentos, como un repositorio de mensajes tipo blog.';
        $nuevo->tipo='Otros';
        $nuevo->isFile=rand(0,1);
        //$nuevo->uri='';
        $nuevo->save();



    }
}
