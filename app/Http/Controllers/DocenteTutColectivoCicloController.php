<?php

namespace App\Http\Controllers;

use App\Models\DocenteTutColectivoCiclo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DocenteTutColectivoCicloController extends Controller
{

    public function search2($docente,$curso) {
        //$docente -1 o id docente. / $ciclo -1 o id de ciclo / retciclo unir los datos del ciclo / retdocente unir los datos del docente
        $r=DocenteTutColectivoCiclo::where('docente_id',$docente)->where('curso',$curso)->with('ciclos.proyectos')->with('ciclos.proyectos.estados')->with('ciclos.proyectos.alumnos')->get();

        if (sizeOf($r)==0) {
            return response()->json(['message'=>'No hay datos con esas características.'],404);
        } else {
            return response($r,200);
        }
    }

    public function searchciclocurso($curso,$ciclo_id) {

        $r=DocenteTutColectivoCiclo::where('curso',$curso)->where('ciclo_id',$ciclo_id)->with('docentes')->with('ciclos')->get();

        if (sizeOf($r)==0) {
            return response()->json(['message'=>'No hay datos con esas características.'],404);
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
        return response()->json(DocenteTutColectivoCiclo::orderBy('id')->get(),200);
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
            'docente_id'=>'required|numeric',
            'ciclo_id'=>'required|numeric',
            'curso'=>'required|numeric'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'Validation Error']);
        } else {
            //Si existe ya la combinacion de ciclo y curso, no se crea uno nuevo. Se modifica el Docente_ID
            //$docenteTutColectivoCiclo=DocenteTutColectivoCiclo::create($data); 
            //OTRA OPCION
            $docenteTutColectivoCiclo=DocenteTutColectivoCiclo::firstOrCreate(['ciclo_id'=>$request->input('ciclo_id'),'curso'=>$request->input('curso')]);
            //$docenteTutColectivoCiclo=new DocenteTutColectivoCiclo();
            $docenteTutColectivoCiclo->docente_id=$request->input('docente_id');
            //$docenteTutColectivoCiclo->ciclo_id=$request->input('ciclo_id');
            //$docenteTutColectivoCiclo->curso=$request->input('curso');

            if ($docenteTutColectivoCiclo->save()) {
                return response()->json(['message' => 'DocenteTutColectivoCiclo created successfully','id'=>$docenteTutColectivoCiclo->id], 201);
            } else {
                return response()->json(['message' => 'Error, DocenteTutColectivoCiclo wasn`t created'], 500);
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
        $docenteTutColectivoCiclo=DocenteTutColectivoCiclo::find($id);
        if ($docenteTutColectivoCiclo==null) {
            return response()->json(['message'=>'DocenteTutColectivoCiclo '.$id.' doesn`t exist'],404);
        } else {
            return response()->json($docenteTutColectivoCiclo,200);
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
        $docenteTutColectivoCiclo=DocenteTutColectivoCiclo::find($id);
        if ($docenteTutColectivoCiclo==null) {
            return response()->json(['message'=>'DocenteTutColectivoCiclo '.$id.' doesn`t exist'],500);
        } else {
            $validator=Validator::make($request->all(),[
                'docente_id'=>'numeric',
                'ciclo_id'=>'numeric',
                'curso'=>'numeric'
            ]);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors().' Validation Error'],500);
            } else {
                //$docenteTutColectivoCiclo->update($request->all());
                if ($request->has('docente_id') && $request->filled('docente_id')) {$docenteTutColectivoCiclo->docente_id=$request->input('docente_id');}
                if ($request->has('ciclo_id') && $request->filled('ciclo_id')) {$docenteTutColectivoCiclo->ciclo_id=$request->input('ciclo_id');}
                if ($request->has('curso') && $request->filled('curso')) {$docenteTutColectivoCiclo->curso=$request->input('curso');}

                if ($docenteTutColectivoCiclo->save()) {
                    return response()->json(['message' => 'DocenteTutColectivoCiclo updated successfully'], 200);
                } else {
                    return response()->json(['message' => 'Error, DocenteTutColectivoCiclo wasn`t updated'], 500);
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
        $docenteTutColectivoCiclo=DocenteTutColectivoCiclo::find($id);
        if ($docenteTutColectivoCiclo!=null) {
            if ($docenteTutColectivoCiclo->delete()) {
                return response()->json(['message'=>'DocenteTutColectivoCiclo '.$id.' deleted'],200);
            } else {
                return response()->json(['message'=>'Error when deleting DocenteTutColectivoCiclo '.$id.'.'],500);
            }
        } else {
            return response()->json(['message'=>'There is no DocenteTutColectivoCiclo '.$id.'.'],500);
        }
    }
}

