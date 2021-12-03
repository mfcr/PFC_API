<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class FechaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fechas')->delete(); 
		DB::table('fechas')->insert(['curso'=>2021,'nombre'=>'Presentación de anteproyectos',
			'descripcion'=>'Los alumnos deberán presentar el anteproyecto al tutor del módulo de PFC para su preevaluación',
			'fechaLimite'=>'2021-01-21']);
		DB::table('fechas')->insert(['curso'=>2021,'nombre'=>'Aprobacion de ateproyectos',
			'descripcion'=>'Los anteproyectos presentados debidamente evaluados como Apto o No apto se encontrarán en el tablón de anuncios del centro. En el caso de aparecer como NO APTO, póngase en contacto con su tutor para realizar las correcciones oportunas.',
			'fechaLimite'=>'2021-01-25']);
		DB::table('fechas')->insert(['curso'=>2021,'nombre'=>'Presentación de anteproyectos reformados',
			'descripcion'=>'Los alumnos cuyos anteproyectos fueron rechazados en primera instancia, deberán presentar el reformado para su aprobación final. Los proyectos no aprobados en esta segunda oportunidad no se podrán presentar en este curso siendo imprescindible que el alumno solicite la anulación de la matrícula para evitar perder una convocatoria ya que el módulo de PFC solo dispone de 2 convocatorias.',
			'fechaLimite'=>'2021-02-02']);
		DB::table('fechas')->insert(['curso'=>2021,'nombre'=>'Preevaluación del proyecto por el tutor individual',
			'descripcion'=>'El tutor individual realizará una preevaluación del proyecto indicando al alumno una nota aproximada del proyecto para que el alumno pueda, en caso de ver que previsiblemente no alcance los mínimos necesarios, cancelar matrícula y evitar perder una convocatoria.',
			'fechaLimite'=>'2021-05-12']);
		DB::table('fechas')->insert(['curso'=>2021,'nombre'=>'Fecha tope para anular matrícula.',
			'descripcion'=>'A partir de esta fecha el alumno usará una convocatoria tanto si puede o no presentar el proyecto o si lo va a presentar o no.',
			'fechaLimite'=>'2021-05-15']);
		DB::table('fechas')->insert(['curso'=>2021,'nombre'=>'Presentación del proyecto CONVOCATORIA JUNIO.',
			'descripcion'=>'Fecha máxima de presentación de los documentos del proyecto para los alumnos que cumplan los siguiente requisitos: Tener aprobado el anteproyecto, no haber cancelado la matricula y tener aprobados todos los módulos del ciclo con Unidad Competencial.',
			'fechaLimite'=>'2021-06-02']);
		DB::table('fechas')->insert(['curso'=>2021,'nombre'=>'NOTAS CONVOCATORIA JUNIO.',
			'descripcion'=>'Los proyectos presentados ya han sido evaluados por los tutores y la nota está emitida. Se remitirá la nota a los alumnos por los cauces habituales.',
			'fechaLimite'=>'2021-06-15']);
		DB::table('fechas')->insert(['curso'=>2021,'nombre'=>'Presentación del proyecto CONVOCATORIA DICIEMBRE.',
			'descripcion'=>'Fecha máxima de presentación de los documentos del proyecto para los alumnos que cumplan los siguiente requisitos: Tener aprobado el anteproyecto, no haber cancelado la matricula, no haber presentado el proyecto en la convocatoria de JUNIO y tener aprobados todos los módulos del ciclo con Unidad Competencial.',
			'fechaLimite'=>'2021-12-01']);
		DB::table('fechas')->insert(['curso'=>2021,'nombre'=>'NOTAS CONVOCATORIA DICIEMBRE.',
			'descripcion'=>'Los proyectos presentados ya han sido evaluados por los tutores y la nota está emitida. Se remitirá la nota a los alumnos por los cauces habituales.',
			'fechaLimite'=>'2021-12-15']);

    }
}
