<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProyectoController extends Controller
{

    public function proyectosAdmin($curso) {
        $r=Proyecto::where('curso',$curso)->with('alumnos')->with('ciclos')->with('estados')->orderBy('ciclo_id')->get();

        if (sizeOf($r)==0) {
            return response()->json(['message'=>'No hay Proyectos ese curso.'],404);
        } else {
            return response($r,200);
        }

    }

    public function proyectosTutIndiv($curso,$docente_id) {
        $r=Proyecto::where('curso',$curso)->where('docente_id',$docente_id)->with('alumnos')->with('ciclos')->with('estados')->orderBy('ciclo_id')->get();

        if (sizeOf($r)==0) {
            return response()->json(['message'=>'No hay Proyectos ese curso con ese docente como tutor individual.'],404);
        } else {
            return response($r,200);
        }

    }
    public function proyectos_publicos() {
        $r=Proyecto::where('estado',5)->get();

        if (sizeOf($r)==0) {
            return response()->json(['message'=>'No hay Proyectos publicos.'],404);
        } else {
            return response($r,200);
        }

    }

    public function proyectos_full($id) {

        $r=Proyecto::where('id',$id)->with('alumnos')->with('ciclos')->with('estados')->with('modulos_matriculados')->with('modulos_matriculados.modulos')->with('modulos_matriculados.ciclo_modulos.docente_imparte_modulos')->with('documentos_proyectos')->with('tutor_evalua_proyectos')->get();

        if (sizeOf($r)==0) {
            return response()->json(['message'=>'No existe el Proyecto con id: '.$id],404);
        } else {
            return response($r,200);
        }

    }


    public function search($value) {
        $r=Proyecto::with('ciclos')->where('nombreProyecto','like','%'.$value.'%')->get();
        if (sizeOf($r)==0) {
            return response()->json(['message'=>'No hay Proyectos con la cadena '.$value.' en el nombre.'],404);
        } else {
            return response($r,200);
        }
    }


    public function searchByAlumno($value) {
        $r=Proyecto::where('alumno_id','=',$value)->with('ciclos')->with('estados')->orderBy('curso')->orderBy('ciclo_id')->get();
        if (sizeOf($r)==0) {
            return response()->json(['message'=>'No hay Proyectos del alumno don id '.$value],404);
        } else {
            return response($r,200);
        }
    }

//----------  CRUD FUNCTIONS ------//
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Proyecto::orderBy('id')->get(),200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'alumno_id'=>'required|numeric',
            'ciclo_id'=>'required|numeric',
            'curso'=>'required|numeric',
            'docente_id'=>'numeric',
            'estado'=>'numeric',
            'notaPrevia'=>'numeric',
            'comentarioPrevio'=>'max:100',
            'notaFinal'=>'numeric',
            'nombreProyecto'=>'max:200',
            'tipo_proyecto_id'=>'numeric',
            'descTipo'=>'max:60'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'Validation Error']);
        } else {

            //$proyecto=Proyecto::create($data); 
            //OTRA OPCION
            $proyecto=new Proyecto();
            $proyecto->alumno_id=$request->input('alumno_id');
            $proyecto->ciclo_id=$request->input('ciclo_id');
            $proyecto->curso=$request->input('curso');
            if ($request->has('docente_id') && $request->filled('docente_id')) {$proyecto->docente_id=$request->input('docente_id');}
            if ($request->has('estado') && $request->filled('estado')) {$proyecto->estado=$request->input('estado');}
            if ($request->has('notaPrevia') && $request->filled('notaPrevia')) {$proyecto->notaPrevia=$request->input('notaPrevia');}
            if ($request->has('comentarioPrevio') && $request->filled('comentarioPrevio')) {$proyecto->comentarioPrevio=$request->input('comentarioPrevio');}
            if ($request->has('NotaFinal') && $request->filled('NotaFinal')) {$proyecto->NotaFinal=$request->input('NotaFinal');}
            if ($request->has('nombreProyecto') && $request->filled('nombreProyecto')) {$proyecto->nombreProyecto=$request->input('nombreProyecto');}
            if ($request->has('tipo_proyecto_id') && $request->filled('tipo_proyecto_id')) {$proyecto->tipo_proyecto_id=$request->input('tipo_proyecto_id');}
            if ($request->has('descTipo') && $request->filled('descTipo')) {$proyecto->descTipo=$request->input('descTipo');}
            if ($request->has('textoPropuestaProyecto') && $request->filled('textoPropuestaProyecto')) {$proyecto->textoPropuestaProyecto=$request->input('textoPropuestaProyecto');}
            if ($request->has('textoRequisitosFuncionales') && $request->filled('textoRequisitosFuncionales')) {$proyecto->textoRequisitosFuncionales=$request->input('textoRequisitosFuncionales');}
            if ($request->has('textoModulosRelacionados') && $request->filled('textoModulosRelacionados')) {$proyecto->textoModulosRelacionados=$request->input('textoModulosRelacionados');}

            if ($proyecto->save()) {
                return response()->json(['message' => 'Proyecto created successfully','id'=>$proyecto->id], 201);
            } else {
                return response()->json(['message' => 'Error, Proyecto wasn`t created'], 500);
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proyecto=Proyecto::find($id);
        if ($proyecto==null) {
            return response()->json(['message'=>'Proyecto '.$id.' doesn`t exist'],404);
        } else {
            return response()->json($proyecto,200);
        }    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $proyecto=Proyecto::find($id);
        if ($proyecto==null) {
            return response()->json(['message'=>'Proyecto '.$id.' doesn`t exist'],404);
        } else {
            $validator=Validator::make($request->all(),[
                'alumno_id'=>'numeric',
                'ciclo_id'=>'numeric',
                'curso'=>'numeric',
                'docente_id'=>'numeric',
                'estado'=>'numeric',
                'notaPrevia'=>'numeric',
                'comentarioPrevio'=>'max:100',
                'notaFinal'=>'numeric',
                'nombreProyecto'=>'max:200',
                'tipo_proyecto_id'=>'numeric',
                'descTipo'=>'max:60'
            ]);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors().' Validation Error'],500);
            } else {
                //$proyecto->update($request->all());
                if ($request->has('alumno_id') && $request->filled('alumno_id')) {$proyecto->alumno_id=$request->input('alumno_id');}
                if ($request->has('ciclo_id') && $request->filled('ciclo_id')) {$proyecto->ciclo_id=$request->input('ciclo_id');}
                if ($request->has('curso') && $request->filled('curso')) {$proyecto->curso=$request->input('curso');}
                if ($request->has('docente_id') && $request->filled('docente_id')) {$proyecto->docente_id=$request->input('docente_id');}
                if ($request->has('estado') && $request->filled('estado')) {$proyecto->estado=$request->input('estado');}
                if ($request->has('notaPrevia') && $request->filled('notaPrevia')) {$proyecto->notaPrevia=$request->input('notaPrevia');}
                if ($request->has('comentarioPrevio') && $request->filled('comentarioPrevio')) {$proyecto->comentarioPrevio=$request->input('comentarioPrevio');}
                if ($request->has('NotaFinal') && $request->filled('NotaFinal')) {$proyecto->NotaFinal=$request->input('NotaFinal');}
                if ($request->has('nombreProyecto') && $request->filled('nombreProyecto')) {$proyecto->nombreProyecto=$request->input('nombreProyecto');}
                if ($request->has('tipo_proyecto_id') && $request->filled('tipo_proyecto_id')) {$proyecto->tipo_proyecto_id=$request->input('tipo_proyecto_id');}
                if ($request->has('descTipo') && $request->filled('descTipo')) {$proyecto->descTipo=$request->input('descTipo');}
                if ($request->has('textoPropuestaProyecto') && $request->filled('textoPropuestaProyecto')) {$proyecto->textoPropuestaProyecto=$request->input('textoPropuestaProyecto');}
                if ($request->has('textoRequisitosFuncionales') && $request->filled('textoRequisitosFuncionales')) {$proyecto->textoRequisitosFuncionales=$request->input('textoRequisitosFuncionales');}
                if ($request->has('textoModulosRelacionados') && $request->filled('textoModulosRelacionados')) {$proyecto->textoModulosRelacionados=$request->input('textoModulosRelacionados');}

                if ($proyecto->save()) {
                    return response()->json(['message' => 'Proyecto updated successfully'], 200);
                } else {
                    return response()->json(['message' => 'Error, Proyecto wasn`t updated'], 500);
                }
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proyecto=Proyecto::find($id);
        if ($proyecto!=null) {
            if ($proyecto->delete()) {
                return response()->json(['message'=>'Proyecto '.$id.' deleted'],200);
            } else {
                return response()->json(['message'=>'Error when deleting Proyecto '.$id.'.'],500);
            }
        } else {
            return response()->json(['message'=>'There is no Proyecto '.$id.'.'],500);
        }
    }
}
     


