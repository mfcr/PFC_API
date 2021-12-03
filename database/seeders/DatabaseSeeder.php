<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
class DatabaseSeeder extends Seeder
{


    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	Model::unguard();
    	//Datos fijos para su uso
		$this->call([UserSeeder::class,
                    CicloSeeder::class, 
					ModuloSeeder::class,
					CicloModuloSeeder::class,
                    GrupoRubricaSeeder::class,
                    RubricaSeeder::class,
                    TipoProyectoSeeder::class,
                    TipoProyectoCicloSeeder::class,
                    AdminSeeder::class,
                    EstadosProyectoSeeder::class]);



		//Datos para pruebas
		$this->call([FechaSeeder::class, 
                //AlumnoSeeder::class,
                //DocenteSeeder::class,
                //DocenteImparteModuloSeeder::class,
                DocumentoSeeder::class,
                //ProyectoSeeder::class,
                //DocenteTutColectivoCicloSeeder::class,
                //MensajeSeeder::class,                     <--Tabla anulada
                //DocumentosProyectoSeeder::class,
                //ModulosMatriculadoSeeder::class,                
                //TutorEvaluaProyectoSeeder::class,
                ProyectosPropuestoSeeder::class,
                ParametroSeeder::class]);


		Model::reguard();
    }
}
