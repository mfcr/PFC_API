<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CicloModuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ciclo_modulos')->delete(); 
        //Ciclo 301
		DB::table('ciclo_modulos')->insert(['modulo_id' => 1,'ciclo_id'=>1]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 2,'ciclo_id'=>1]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 3,'ciclo_id'=>1]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 4,'ciclo_id'=>1]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 5,'ciclo_id'=>1]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 6,'ciclo_id'=>1]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 7,'ciclo_id'=>1]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 8,'ciclo_id'=>1]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 9,'ciclo_id'=>1]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 10,'ciclo_id'=>1]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 11,'ciclo_id'=>1]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 12,'ciclo_id'=>1]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 13,'ciclo_id'=>1]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 14,'ciclo_id'=>1]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 15,'ciclo_id'=>1]);
		//Ciclo 301-V
		DB::table('ciclo_modulos')->insert(['modulo_id' => 1,'ciclo_id'=>2]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 2,'ciclo_id'=>2]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 3,'ciclo_id'=>2]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 4,'ciclo_id'=>2]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 5,'ciclo_id'=>2]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 6,'ciclo_id'=>2]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 7,'ciclo_id'=>2]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 8,'ciclo_id'=>2]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 9,'ciclo_id'=>2]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 10,'ciclo_id'=>2]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 11,'ciclo_id'=>2]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 12,'ciclo_id'=>2]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 13,'ciclo_id'=>2]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 14,'ciclo_id'=>2]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 15,'ciclo_id'=>2]);
/*		//Ciclo 301-D
		DB::table('ciclo_modulos')->insert(['modulo_id' => 1,'ciclo_id'=>3]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 2,'ciclo_id'=>3]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 3,'ciclo_id'=>3]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 4,'ciclo_id'=>3]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 5,'ciclo_id'=>3]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 6,'ciclo_id'=>3]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 7,'ciclo_id'=>3]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 8,'ciclo_id'=>3]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 9,'ciclo_id'=>3]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 10,'ciclo_id'=>3]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 11,'ciclo_id'=>3]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 12,'ciclo_id'=>3]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 13,'ciclo_id'=>3]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 14,'ciclo_id'=>3]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 15,'ciclo_id'=>3]);
		//Ciclo 302
		DB::table('ciclo_modulos')->insert(['modulo_id' => 5,'ciclo_id'=>4]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 16,'ciclo_id'=>4]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 17,'ciclo_id'=>4]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 18,'ciclo_id'=>4]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 19,'ciclo_id'=>4]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 20,'ciclo_id'=>4]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 21,'ciclo_id'=>4]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 22,'ciclo_id'=>4]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 23,'ciclo_id'=>4]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 24,'ciclo_id'=>4]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 25,'ciclo_id'=>4]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 26,'ciclo_id'=>4]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 27,'ciclo_id'=>4]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 28,'ciclo_id'=>4]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 15,'ciclo_id'=>4]);*/
		//Ciclo 302-V
		DB::table('ciclo_modulos')->insert(['modulo_id' => 5,'ciclo_id'=>3]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 16,'ciclo_id'=>3]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 17,'ciclo_id'=>3]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 18,'ciclo_id'=>3]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 19,'ciclo_id'=>3]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 20,'ciclo_id'=>3]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 21,'ciclo_id'=>3]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 22,'ciclo_id'=>3]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 23,'ciclo_id'=>3]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 24,'ciclo_id'=>3]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 25,'ciclo_id'=>3]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 26,'ciclo_id'=>3]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 27,'ciclo_id'=>3]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 28,'ciclo_id'=>3]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 15,'ciclo_id'=>3]);
		//Ciclo 302-D
		DB::table('ciclo_modulos')->insert(['modulo_id' => 5,'ciclo_id'=>4]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 16,'ciclo_id'=>4]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 17,'ciclo_id'=>4]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 18,'ciclo_id'=>4]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 19,'ciclo_id'=>4]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 20,'ciclo_id'=>4]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 21,'ciclo_id'=>4]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 22,'ciclo_id'=>4]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 23,'ciclo_id'=>4]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 24,'ciclo_id'=>4]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 25,'ciclo_id'=>4]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 26,'ciclo_id'=>4]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 27,'ciclo_id'=>4]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 28,'ciclo_id'=>4]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 15,'ciclo_id'=>4]);
		//Ciclo 303
		DB::table('ciclo_modulos')->insert(['modulo_id' => 5,'ciclo_id'=>5]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 16,'ciclo_id'=>5]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 17,'ciclo_id'=>5]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 18,'ciclo_id'=>5]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 19,'ciclo_id'=>5]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 20,'ciclo_id'=>5]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 29,'ciclo_id'=>5]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 30,'ciclo_id'=>5]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 31,'ciclo_id'=>5]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 32,'ciclo_id'=>5]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 33,'ciclo_id'=>5]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 34,'ciclo_id'=>5]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 35,'ciclo_id'=>5]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 36,'ciclo_id'=>5]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 15,'ciclo_id'=>5]);
/*		//Ciclo 303-V
		DB::table('ciclo_modulos')->insert(['modulo_id' => 5,'ciclo_id'=>8]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 16,'ciclo_id'=>8]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 17,'ciclo_id'=>8]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 18,'ciclo_id'=>8]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 19,'ciclo_id'=>8]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 20,'ciclo_id'=>8]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 29,'ciclo_id'=>8]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 30,'ciclo_id'=>8]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 31,'ciclo_id'=>8]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 32,'ciclo_id'=>8]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 33,'ciclo_id'=>8]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 34,'ciclo_id'=>8]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 35,'ciclo_id'=>8]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 36,'ciclo_id'=>8]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 15,'ciclo_id'=>8]);*/
		//Ciclo 303-D
		DB::table('ciclo_modulos')->insert(['modulo_id' => 5,'ciclo_id'=>6]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 16,'ciclo_id'=>6]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 17,'ciclo_id'=>6]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 18,'ciclo_id'=>6]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 19,'ciclo_id'=>6]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 20,'ciclo_id'=>6]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 29,'ciclo_id'=>6]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 30,'ciclo_id'=>6]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 31,'ciclo_id'=>6]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 32,'ciclo_id'=>6]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 33,'ciclo_id'=>6]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 34,'ciclo_id'=>6]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 35,'ciclo_id'=>6]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 36,'ciclo_id'=>6]);
		DB::table('ciclo_modulos')->insert(['modulo_id' => 15,'ciclo_id'=>6]);

    }
}
