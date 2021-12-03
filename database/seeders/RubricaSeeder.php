<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rubrica;
use App\Models\Ciclo;
use App\Models\GrupoRubrica;

class RubricaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//Rellenamos las rúbricas de un ciclo.
    	Rubrica::insert([
    		['curso'=>2021,'ciclo_id'=>1,'grupo_rubrica_id'=>1,'rubrica'=>'INTEGRAR CONOCIMIENTOS',
    		'descExcelente'=>'Relaciona los contenidos de todos los módulos asociados al CF.',
    		'descBien'=>'Relaciona los contenidos de la mayoría de los módulos asociados al CF.',
    		'descRegular'=>'Relaciona los contenidos de al menos 3 módulos asociados al CF.',
    		'descInsuficiente'=>'Relaciona los contenidos de menos de 3 módulos asociados al CF.',
    		'porcentaje'=>10.00],
    		['curso'=>2021,'ciclo_id'=>1,'grupo_rubrica_id'=>1,'rubrica'=>'APORTA NUEVAS TECNOLOGÍAS',
    		'descExcelente'=>'Incluye al menos 3 tecnologías no vistas en los módulos del CF.',
    		'descBien'=>'Incluye al menos 2 tecnologías no vistas en los módulos del CF.',
    		'descRegular'=>'Incluye al menos 1 tecnologías no vistas en los módulos del CF.',
    		'descInsuficiente'=>'No incluye tecnologías no vistas en los módulos del CF.',
    		'porcentaje'=>7.50],
    		['curso'=>2021,'ciclo_id'=>1,'grupo_rubrica_id'=>1,'rubrica'=>'REQUISITOS TÉCNICOS',
    		'descExcelente'=>'Se describen completamente y en detalle los requisitos software (programas y herramientas utilizadas, software y versiones de los mismos, frameworks, lenguajes de programación) y requisitos hardware (servidores, clientes dispositivos, ….) necesarios para la realización y ejecución del proyecto. La aplicación tendrá varios perfiles de usuarios con contenidos diferenciados',
    		'descBien'=>'No se describen completamente los requisitos software (programas y herramientas utilizadas, software y versiones de los mismos, frameworks, lenguajes de programación) y requisitos hardware (servidores, clientes, dispositivos, ....) necesarios para la realización y ejecución del proyecto. Las descripciones realizadas se hacen en detalle. La aplicación tendrá varios perfiles de usuarios con contenidos diferenciados.',
    		'descRegular'=>'Se describen completamente y sin detalle los requisitos software (programas y herramientas utilizadas, software y versiones de los mismos, frameworks, lenguajes de programación) y requisitos hardware (servidores, clientes dispositivos, ….) necesarios para la realización y ejecución del proyecto. La aplicación tendrá varios perfiles de usuarios con contenidos diferenciados',
    		'descInsuficiente'=>'No se describen los requisitos software (programas y herramientas utilizadas, software y versiones de los mismos, frameworks, lenguajes de programación) y requisitos hardware (servidores, clientes dispositivos, ….) necesarios para la realización y ejecución del proyecto. La aplicación no tiene distintos perfiles de usuarios con contenidos diferenciados',
    		'porcentaje'=>10.00],
    		['curso'=>2021,'ciclo_id'=>1,'grupo_rubrica_id'=>1,'rubrica'=>'BASES DE DATOS',
    		'descExcelente'=>'Se presentan todos los diagramas del modelo de datos.
La base de datos está normalizada.',
    		'descBien'=>'Se presentan todos los diagramas del modelo de datos.
La base de datos no está normalizada',
    		'descRegular'=>'No se presentan todos los diagramas del modelo de datos
La base de datos está normalizada',
    		'descInsuficiente'=>'No se presentan todos los diagramas del modelo de datos
La base de datos no está normalizada',
    		'porcentaje'=>10.00],
    		['curso'=>2021,'ciclo_id'=>1,'grupo_rubrica_id'=>1,'rubrica'=>'CALIDAD Y COMPLEJIDAD',
    		'descExcelente'=>'Satisface todas las perspectivas de uso de la aplicación.
La experiencia del usuario (UX) está elaborada y la parte técnica está resuelta con fundamento y precisión',
    		'descBien'=>'Satisface todas las perspectivas de uso de la aplicación.
La experiencia del usuario (UX) no está elaborada o la parte técnica no está resuelta con fundamento y precisión',
    		'descRegular'=>'Satisface todas las perspectivas de uso de la aplicación.
La experiencia del usuario (UX) no está elaborada y la parte técnica no está resuelta con fundamento y precisión',
    		'descInsuficiente'=>'La experiencia de usuario (UX) es liosa y difícil. La parte técnica no está bien resulta ya que nos aplica los fundamentos adquiridos.',
    		'porcentaje'=>12.50],

    		['curso'=>2021,'ciclo_id'=>1,'grupo_rubrica_id'=>2,'rubrica'=>'ASPECTOS FORMALES. APARTADOS DEL TRABAJO',
    		'descExcelente'=>'Cumple con todos los requisitos formales establecidos en la guía (tipo de letra, interlineado, encabezado, paginación, …).
Tiene todos los apartados requeridos en el trabajo y bien organizados y/o desarrollados (portada, índice, …)',
    		'descBien'=>'Cumple con al menos el 80% los requisitos formales establecidos en la guía (tipo de letra, interlineado, encabezado, paginación, …)
Tiene todos los apartados requeridos en el trabajo, pero inadecuadamente organizados y/o desarrollados. O faltan algunos apartados (al menos 2) requeridos en el trabajo.',
    		'descRegular'=>'Cumple con al menos el 60% de los requisitos formales establecidos en la guía (tipo de letra, interlineado, encabezado, paginación, …)
Faltan al menos 4 apartados requeridos en el trabajo y/o están inadecuadamente organizados y /o desarrollados.',
    		'descInsuficiente'=>'No cumple con al menos el 60% de los requisitos formales establecidos en la guía (tipo de letra, interlineado, encabezado, paginación, …)
Faltan más de 4 apartados y/o están inadecuadamente organizados.',
    		'porcentaje'=>9.00],
    		['curso'=>2021,'ciclo_id'=>1,'grupo_rubrica_id'=>2,'rubrica'=>'REDACCIÓN, EXPRESIÓN Y ORTOGRAFÍA.',
    		'descExcelente'=>'Está redactado de forma clara, construyendo frases sintácticamente correctas, sin errores ortográficos y usando adecuadamente los signos de puntuación',
    		'descBien'=>'El trabajo escrito presenta algún error ortográfico, gramatical y/o de expresión muy puntual.',
    		'descRegular'=>'El trabajo escrito presenta unos cuantos errores ortográficos, gramaticales y de expresión.',
    		'descInsuficiente'=>'El trabajo escrito presenta muchos errores ortográficos, gramaticales y de expresión',
    		'porcentaje'=>9.00],
    		['curso'=>2021,'ciclo_id'=>1,'grupo_rubrica_id'=>2,'rubrica'=>'CONCLUSIONES',
    		'descExcelente'=>'Las conclusiones son adecuadas a la información que se maneja y a la realidad analizada, son significativas para la globalidad del Proyecto.',
    		'descBien'=>'Las conclusiones parten de la realidad analizada y de la información manejada en el trabajo, sin embargo son parciales, están incompletas o poco definidas.',
    		'descRegular'=>'Las conclusiones tienen que ver tangencialmente con la realidad analizada y la información manejada en el trabajo, además no son significativos para la globalidad del Proyecto',
    		'descInsuficiente'=>'Las conclusiones no se vinculan con la información que se maneja y/o con la realidad en que se deben aplicar y/o nos son significativos',
    		'porcentaje'=>6.00],
    		['curso'=>2021,'ciclo_id'=>1,'grupo_rubrica_id'=>2,'rubrica'=>'ILUSTRACIONES, TABLAS, GRÁFICOS,…',
    		'descExcelente'=>'El uso de tablas, ilustraciones, gráficos aporta información relevante. La enumeración de estos elementos se hace correctamente.',
    		'descBien'=>'La enumeración y el título de tablas, gráficos, etc es adecuada, pero no aporta información relevante.',
    		'descRegular'=>'La enumeración de tablas, gráficos y demás ilustraciones tienen erratas. Algunos títulos no son claros o específicos. No aportan información relevante.',
    		'descInsuficiente'=>'No se incluyen ilustraciones, tablas, ..',
    		'porcentaje'=>3.00],
    		['curso'=>2021,'ciclo_id'=>1,'grupo_rubrica_id'=>2,'rubrica'=>'REFERENCIAS BIBLIOGRÁFICAS',
    		'descExcelente'=>'Incluye todas las referencias bibliográficas citadas en función de la normativa APA, o cualquiera de las citadas en la guía.',
    		'descBien'=>'Incluye suficientes referencias bibliográficas citadas en función de la normativa APA, o cualquiera de las citadas en la guía.',
    		'descRegular'=>'Incluye insuficientes referencias bibliográficas citadas en función de la normativa APA, o cualquiera de las citadas en la guía.',
    		'descInsuficiente'=>'No incluye referencias bibliográficas',
    		'porcentaje'=>3.00],
    		['curso'=>2021,'ciclo_id'=>1,'grupo_rubrica_id'=>3,'rubrica'=>'CLARIDAD Y PRECISIÓN DE LA EXPOSICIÓN',
    		'descExcelente'=>'La presentación se estructura de manera que resulta muy atractiva para quien la escucha. Presenta las ideas de forma organizada y sintética. Las explicaciones y descripciones son claras y precisas.',
    		'descBien'=>'La estructura de la presentación contiene algunos errores, aunque en conjunto es bastante efectiva. Consigue en general captar la atención de quién escucha. Las explicaciones y descripciones son suficientemente claras y precisas',
    		'descRegular'=>'La estructura de la presentación no es la adecuada a la información que se quiere transmitir. En algún momento se pierde el hilo argumental, no consigue captar la atención de quien le escucha. Las explicaciones y descripciones son en algunos momentos confusas.',
    		'descInsuficiente'=>'La presentación no está estructurada, es difícil de seguir. Resulta poco atractiva para el que escucha. Las explicaciones y descripciones son confusas',
    		'porcentaje'=>16.00],
    		['curso'=>2021,'ciclo_id'=>1,'grupo_rubrica_id'=>3,'rubrica'=>'SE AJUSTA AL TIEMPO
15 MINUTOS',
    		'descExcelente'=>'El alumno se ajusta perfectamente a los tiempos.',
    		'descBien'=>'No se ajusta el tiempo de exposición fijado en +- 30%',
    		'descRegular'=>'El tiempo de exposición fijado en está en el intervalo +- (30 – 50)%',
    		'descInsuficiente'=>'No se ajusta el tiempo de exposición fijado en un valor mayor de +- 50%',
    		'porcentaje'=>4.00],
    	]);

		//Obtenemos ciclos y rubricas y creamos las rubricas para el resto de los ciclos.
		$ciclos=Ciclo::all();
		$rubricas=Rubrica::all();
		foreach ($ciclos as $c) {
			if ($c->id>1) {
				foreach($rubricas as $r) {
					$nuevo=new Rubrica();
					$nuevo->curso=$r->curso;
					$nuevo->ciclo_id=$c->id;
					$nuevo->grupo_rubrica_id=$r->grupo_rubrica_id;
					$nuevo->rubrica=$r->rubrica;
					$nuevo->descExcelente=$r->descExcelente;
					$nuevo->descBien=$r->descBien;
					$nuevo->descRegular=$r->descRegular;
					$nuevo->descInsuficiente=$r->descInsuficiente;
					$nuevo->porcentaje=$r->porcentaje;
					$nuevo->save();
				}
			}
		}



    }
}
