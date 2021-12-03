<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CicloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ciclos')->delete(); 
		DB::table('ciclos')->insert([
			'codigoCiclo' => 'IFC301',
			'nombreCiclo'=>'Administración de Sistemas Informáticos en Red (Diurno)',
			'descripcion'=>'El ciclo de Administración de Sistemas Informáticos en Red forma profesionales del sector informático cualificados en la instalación, configuración y gestión de equipos informáticos y redes de ordenadores, además de en la explotación y administración de aplicaciones de escritorio y web, cubriendo así un hueco existente en el mercado laboral gracias a su competencia en las últimas tecnologías y novedades en materia de administración de sistemas informáticos en red']);
		DB::table('ciclos')->insert([
			'codigoCiclo' => 'IFC301-V',
			'nombreCiclo'=>'Administración de Sistemas Informáticos en Red (Vespertino)',
			'descripcion'=>'El ciclo de Administración de Sistemas Informáticos en Red forma profesionales del sector informático cualificados en la instalación, configuración y gestión de equipos informáticos y redes de ordenadores, además de en la explotación y administración de aplicaciones de escritorio y web, cubriendo así un hueco existente en el mercado laboral gracias a su competencia en las últimas tecnologías y novedades en materia de administración de sistemas informáticos en red' ]);
		/*DB::table('ciclos')->insert([
			'codigoCiclo' => 'IFC301-D',
			'nombreCiclo'=>'Administración de Sistemas Informáticos en Red (Distancia)',
			'descripcion'=>'El ciclo de Administración de Sistemas Informáticos en Red forma profesionales del sector informático cualificados en la instalación, configuración y gestión de equipos informáticos y redes de ordenadores, además de en la explotación y administración de aplicaciones de escritorio y web, cubriendo así un hueco existente en el mercado laboral gracias a su competencia en las últimas tecnologías y novedades en materia de administración de sistemas informáticos en red']);*/
		/*DB::table('ciclos')->insert([
			'codigoCiclo' => 'IFC302-D',
			'nombreCiclo'=>'Desarrollo de Aplicaciones Multiplataforma (Diurno)',
			'descripcion'=>'El ciclo de Desarrollo de Aplicaciones Multiplataforma forma profesionales del sector informático que están cualificados y cualificadas en el desarrollo, implantación y mantenimiento de aplicaciones multiplataforma y de informática móvil, así como en la programación y utilización de aplicaciones para la gestión empresarial y de propósito general, cubriendo así un hueco existente en el mercado laboral gracias a su competencia en las últimas tecnologías y novedades en materia de programación de aplicaciones multiplataforma.']);*/
		DB::table('ciclos')->insert([
			'codigoCiclo' => 'IFC302-V',
			'nombreCiclo'=>'Desarrollo de Aplicaciones Multiplataforma (Vespertino)',
			'descripcion'=>'El ciclo de Desarrollo de Aplicaciones Multiplataforma forma profesionales del sector informático que están cualificados y cualificadas en el desarrollo, implantación y mantenimiento de aplicaciones multiplataforma y de informática móvil, así como en la programación y utilización de aplicaciones para la gestión empresarial y de propósito general, cubriendo así un hueco existente en el mercado laboral gracias a su competencia en las últimas tecnologías y novedades en materia de programación de aplicaciones multiplataforma.' ]);
		DB::table('ciclos')->insert([
			'codigoCiclo' => 'IFC302-D',
			'nombreCiclo'=>'Desarrollo de Aplicaciones Multiplataforma (Distancia)',
			'descripcion'=>'El ciclo de Desarrollo de Aplicaciones Multiplataforma forma profesionales del sector informático que están cualificados y cualificadas en el desarrollo, implantación y mantenimiento de aplicaciones multiplataforma y de informática móvil, así como en la programación y utilización de aplicaciones para la gestión empresarial y de propósito general, cubriendo así un hueco existente en el mercado laboral gracias a su competencia en las últimas tecnologías y novedades en materia de programación de aplicaciones multiplataforma.' ]);
		DB::table('ciclos')->insert([
			'codigoCiclo' => 'IFC303',
			'nombreCiclo'=>'Desarrollo de Aplicaciones Web (Diurno)',
			'descripcion'=>'El ciclo de Desarrollo de Aplicaciones Web forma profesionales del sector informático que están cualificados y cualificadas en el desarrollo, implantación y mantenimiento de aplicaciones web. Este profesional ejerce su actividad en empresas o entidades públicas o privadas tanto por cuenta ajena como propia, desempeñando su trabajo en el área de desarrollo de aplicaciones informáticas relacionadas con entornos Web (intranet, extranet e internet).' ]);
		/*DB::table('ciclos')->insert([
			'codigoCiclo' => 'IFC303-V',
			'nombreCiclo'=>'Desarrollo de Aplicaciones Web (Vespertino)',
			'descripcion'=>'El ciclo de Desarrollo de Aplicaciones Web forma profesionales del sector informático que están cualificados y cualificadas en el desarrollo, implantación y mantenimiento de aplicaciones web. Este profesional ejerce su actividad en empresas o entidades públicas o privadas tanto por cuenta ajena como propia, desempeñando su trabajo en el área de desarrollo de aplicaciones informáticas relacionadas con entornos Web (intranet, extranet e internet).']);*/
		DB::table('ciclos')->insert([
			'codigoCiclo' => 'IFC303-D',
			'nombreCiclo'=>'Desarrollo de Aplicaciones Web (Distancia)',
			'descripcion'=>'El ciclo de Desarrollo de Aplicaciones Web forma profesionales del sector informático que están cualificados y cualificadas en el desarrollo, implantación y mantenimiento de aplicaciones web. Este profesional ejerce su actividad en empresas o entidades públicas o privadas tanto por cuenta ajena como propia, desempeñando su trabajo en el área de desarrollo de aplicaciones informáticas relacionadas con entornos Web (intranet, extranet e internet).' ]);


        
    }
}
