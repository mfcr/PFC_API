<?php

namespace App\Http\Controllers;

use App\Models\TutorEvaluaProyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TutorEvaluaProyectoController extends Controller
{
//----------  CRUD FUNCTIONS ------//
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(TutorEvaluaProyecto::orderBy('id')->get(),200);
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
            'proyecto_id'=>'required|numeric',
            'docente_id'=>'required|numeric',
            'rubrica_id'=>'required|numeric',
            'esColectivo'=>'required|boolean',
            'nota'=>'numeric',
            'comentario'=>'max:50'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'Validation Error']);
        } else {

            //$tutorEvaluaProyecto=TutorEvaluaProyecto::create($data); 
            //OTRA OPCION
            $tutorEvaluaProyecto=new TutorEvaluaProyecto();
            $tutorEvaluaProyecto->proyecto_id=$request->input('proyecto_id');
            $tutorEvaluaProyecto->docente_id=$request->input('docente_id');
            $tutorEvaluaProyecto->rubrica_id=$request->input('rubrica_id');
            $tutorEvaluaProyecto->esColectivo=$request->input('esColectivo');
            if ($request->has('nota') && $request->filled('nota')) {$tutorEvaluaProyecto->nota=$request->input('nota');}
            if ($request->has('telefono') && $request->filled('telefono')) {$tutorEvaluaProyecto->telefono=$request->input('telefono');}
            if ($request->has('comentario') && $request->filled('comentario')) {$tutorEvaluaProyecto->comentario=$request->input('comentario');}

            if ($tutorEvaluaProyecto->save()) {
                return response()->json(['message' => 'TutorEvaluaProyecto created successfully','id'=>$tutorEvaluaProyecto->id], 201);
            } else {
                return response()->json(['message' => 'Error, TutorEvaluaProyecto wasn`t created'], 500);
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
        $tutorEvaluaProyecto=TutorEvaluaProyecto::find($id);
        if ($tutorEvaluaProyecto==null) {
            return response()->json(['message'=>'TutorEvaluaProyecto '.$id.' doesn`t exist'],404);
        } else {
            return response()->json($tutorEvaluaProyecto,200);
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
        $tutorEvaluaProyecto=TutorEvaluaProyecto::find($id);
        if ($tutorEvaluaProyecto==null) {
            return response()->json(['message'=>'TutorEvaluaProyecto '.$id.' doesn`t exist'],404);
        } else {
            $validator=Validator::make($request->all(),[
                'proyecto_id'=>'numeric',
                'docente_id'=>'numeric',
                'rubrica_id'=>'numeric',
                'nota'=>'numeric',
                'comentario'=>'max:50',
                'esColectivo'=>'boolean'
            ]);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors().' Validation Error'],500);
            } else {
                //$tutorEvaluaProyecto->update($request->all());
                if ($request->has('proyecto_id') && $request->filled('proyecto_id')) {$tutorEvaluaProyecto->proyecto_id=$request->input('proyecto_id');}
                if ($request->has('docente_id') && $request->filled('docente_id')) {$tutorEvaluaProyecto->docente_id=$request->input('docente_id');}
                if ($request->has('rubrica_id') && $request->filled('rubrica_id')) {$tutorEvaluaProyecto->rubrica_id=$request->input('rubrica_id');}
                if ($request->has('nota') && $request->filled('nota')) {$tutorEvaluaProyecto->nota=$request->input('nota');}
                if ($request->has('telefono') && $request->filled('telefono')) {$tutorEvaluaProyecto->telefono=$request->input('telefono');}
                if ($request->has('comentario') && $request->filled('comentario')) {$tutorEvaluaProyecto->comentario=$request->input('comentario');}
                if ($request->has('esColectivo') && $request->filled('esColectivo')) {$tutorEvaluaProyecto->esColectivo=$request->input('esColectivo');}

                if ($tutorEvaluaProyecto->save()) {
                    return response()->json(['message' => 'TutorEvaluaProyecto updated successfully'], 200);
                } else {
                    return response()->json(['message' => 'Error, TutorEvaluaProyecto wasn`t updated'], 500);
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
        $tutorEvaluaProyecto=TutorEvaluaProyecto::find($id);
        if ($tutorEvaluaProyecto!=null) {
            if ($tutorEvaluaProyecto->delete()) {
                return response()->json(['message'=>'TutorEvaluaProyecto '.$id.' deleted'],200);
            } else {
                return response()->json(['message'=>'Error when deleting TutorEvaluaProyecto '.$id.'.'],500);
            }
        } else {
            return response()->json(['message'=>'There is no TutorEvaluaProyecto '.$id.'.'],500);
        }
    }
}
      
