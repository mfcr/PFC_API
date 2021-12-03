<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ModuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modulos')->delete(); 
		DB::table('modulos')->insert(['codigoModulo' => '369','nombreModulo'=>'Implantación de sistemas operativos','tiene_UC'=>true,'curso'=>1]);
		DB::table('modulos')->insert(['codigoModulo' => '370','nombreModulo'=>'Planificación y administración de redes','tiene_UC'=>true,'curso'=>1]);
		DB::table('modulos')->insert(['codigoModulo' => '371','nombreModulo'=>'Fundamentos de hardware','tiene_UC'=>true,'curso'=>1]);
		DB::table('modulos')->insert(['codigoModulo' => '372','nombreModulo'=>'Gestión de bases de datos','tiene_UC'=>true,'curso'=>1]);
		DB::table('modulos')->insert(['codigoModulo' => '373','nombreModulo'=>'Lenguajes de marcas y sistemas de gestión de información','tiene_UC'=>false,'curso'=>1]);
		DB::table('modulos')->insert(['codigoModulo' => '374','nombreModulo'=>'Administración de sistemas operativos','tiene_UC'=>true,'curso'=>2]);
		DB::table('modulos')->insert(['codigoModulo' => '375','nombreModulo'=>'Servicios de red e internet','tiene_UC'=>true,'curso'=>2]);
		DB::table('modulos')->insert(['codigoModulo' => '376','nombreModulo'=>'Implantación de aplicaciones web','tiene_UC'=>true,'curso'=>2]);
		DB::table('modulos')->insert(['codigoModulo' => '377','nombreModulo'=>'Administración de sistemas gestores de bases de datos','tiene_UC'=>true,'curso'=>2]);
		DB::table('modulos')->insert(['codigoModulo' => '378','nombreModulo'=>'Seguridad y alta disponibilidad','tiene_UC'=>true,'curso'=>2]);
		DB::table('modulos')->insert(['codigoModulo' => '379','nombreModulo'=>'Proyecto ASIR','tiene_UC'=>false,'curso'=>2]);
		DB::table('modulos')->insert(['codigoModulo' => '380','nombreModulo'=>'Formación y orientación laboral','tiene_UC'=>false,'curso'=>1]);
		DB::table('modulos')->insert(['codigoModulo' => '381','nombreModulo'=>'Empresa e iniciativa emprendedora','tiene_UC'=>false,'curso'=>2]);
		DB::table('modulos')->insert(['codigoModulo' => '382','nombreModulo'=>'Formación en centros de trabajo','tiene_UC'=>false,'curso'=>2]);
		DB::table('modulos')->insert(['codigoModulo' => 'PA0003','nombreModulo'=>'Lengua extranjera para uso profesional','tiene_UC'=>false,'curso'=>1]);
		DB::table('modulos')->insert(['codigoModulo' => '483','nombreModulo'=>'Sistemas Informáticos','tiene_UC'=>true,'curso'=>1]);
		DB::table('modulos')->insert(['codigoModulo' => '484','nombreModulo'=>'Bases de datos','tiene_UC'=>true,'curso'=>1]);
		DB::table('modulos')->insert(['codigoModulo' => '485','nombreModulo'=>'Programación','tiene_UC'=>true,'curso'=>1]);
		DB::table('modulos')->insert(['codigoModulo' => '486','nombreModulo'=>'Acceso a datos','tiene_UC'=>true,'curso'=>2]);
		DB::table('modulos')->insert(['codigoModulo' => '487','nombreModulo'=>'Entornos de desarrollo','tiene_UC'=>false,'curso'=>1]);
		DB::table('modulos')->insert(['codigoModulo' => '488','nombreModulo'=>'Desarrollo de interfaces','tiene_UC'=>true,'curso'=>2]);
		DB::table('modulos')->insert(['codigoModulo' => '489','nombreModulo'=>'Programación multimedia y dispositivos móviles','tiene_UC'=>false,'curso'=>2]);
		DB::table('modulos')->insert(['codigoModulo' => '490','nombreModulo'=>'Programación de servicios y procesos','tiene_UC'=>true,'curso'=>2]);
		DB::table('modulos')->insert(['codigoModulo' => '491','nombreModulo'=>'Sistemas de gestión empresarial','tiene_UC'=>true,'curso'=>2]);
		DB::table('modulos')->insert(['codigoModulo' => '492','nombreModulo'=>'Proyecto DAM','tiene_UC'=>false,'curso'=>2]);
		DB::table('modulos')->insert(['codigoModulo' => '493','nombreModulo'=>'Formación y orientación laboral','tiene_UC'=>false,'curso'=>1]);
		DB::table('modulos')->insert(['codigoModulo' => '494','nombreModulo'=>'Empresa e iniciativa emprendedora','tiene_UC'=>false,'curso'=>2]);
		DB::table('modulos')->insert(['codigoModulo' => '495','nombreModulo'=>'Formación en centros de trabajo','tiene_UC'=>false,'curso'=>2]);
		DB::table('modulos')->insert(['codigoModulo' => '612','nombreModulo'=>'Desarrollo web en entorno cliente','tiene_UC'=>true,'curso'=>2]);
		DB::table('modulos')->insert(['codigoModulo' => '613','nombreModulo'=>'Desarrollo web en entorno servidor','tiene_UC'=>true,'curso'=>2]);		
		DB::table('modulos')->insert(['codigoModulo' => '614','nombreModulo'=>'Despliegue de aplicaciones web','tiene_UC'=>true,'curso'=>2]);
		DB::table('modulos')->insert(['codigoModulo' => '615','nombreModulo'=>'Diseño de interfaces web','tiene_UC'=>true,'curso'=>2]);
		DB::table('modulos')->insert(['codigoModulo' => '616','nombreModulo'=>'Proyecto DAW','tiene_UC'=>false,'curso'=>2]);
		DB::table('modulos')->insert(['codigoModulo' => '617','nombreModulo'=>'Formación y orientación laboral','tiene_UC'=>false,'curso'=>1]);
		DB::table('modulos')->insert(['codigoModulo' => '618','nombreModulo'=>'Empresa e iniciativa emprendedora','tiene_UC'=>false,'curso'=>2]);
		DB::table('modulos')->insert(['codigoModulo' => '619','nombreModulo'=>'Formación en centros de trabajo','tiene_UC'=>false,'curso'=>2]);
    }
}
