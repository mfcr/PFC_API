<?php

namespace App\Http\Controllers;

use App\Models\ModulosMatriculado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ModulosMatriculadoController extends Controller
{

//----------  CRUD FUNCTIONS ------//
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(ModulosMatriculado::orderBy('id')->get(),200);
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
            'ciclo_modulo_id'=>'required|numeric',
            'preevaluado'=>'boolean',
            'comentario'=>'max:100'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'Validation Error']);
        } else {
            //$modulosMatriculado=ModulosMatriculado::create($data); 
            //OTRA OPCION
            $modulosMatriculado=new ModulosMatriculado();
            $modulosMatriculado->proyecto_id=$request->input('proyecto_id');
            $modulosMatriculado->ciclo_modulo_id=$request->input('ciclo_modulo_id');
            if ($request->has('estado') && $request->filled('estado')) {$modulosMatriculado->estado=$request->input('estado');}
            if ($request->has('preevaluado') && $request->filled('preevaluado')) {$modulosMatriculado->preevaluado=$request->input('preevaluado');}
            if ($request->has('comentario') && $request->filled('comentario')) {$modulosMatriculado->comentario=$request->input('comentario');}

            if ($modulosMatriculado->save()) {
                return response()->json(['message' => 'ModulosMatriculado created successfully','id'=>$modulosMatriculado->id], 201);
            } else {
                return response()->json(['message' => 'Error, ModulosMatriculado wasn`t created'], 500);
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
        $modulosMatriculado=ModulosMatriculado::find($id);
        if ($modulosMatriculado==null) {
            return response()->json(['message'=>'ModulosMatriculado '.$id.' doesn`t exist'],404);
        } else {
            return response()->json($modulosMatriculado,200);
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
        $modulosMatriculado=ModulosMatriculado::find($id);
        if ($modulosMatriculado==null) {
            return response()->json(['message'=>'ModulosMatriculado '.$id.' doesn`t exist'],404);
        } else {
            $validator=Validator::make($request->all(),[
                'proyecto_id'=>'numeric',
                'ciclo_modulo_id'=>'numeric',
                'preevaluado'=>'boolean',
                'comentario'=>'max:100'
            ]);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors().' Validation Error'],500);
            } else {
                //$modulosMatriculado->update($request->all());
                if ($request->has('proyecto_id') && $request->filled('proyecto_id')) {$modulosMatriculado->proyecto_id=$request->input('proyecto_id');}
                if ($request->has('ciclo_modulo_id') && $request->filled('ciclo_modulo_id')) {$modulosMatriculado->ciclo_modulo_id=$request->input('ciclo_modulo_id');}
                if ($request->has('estado') && $request->filled('estado')) {$modulosMatriculado->estado=$request->input('estado');}
                if ($request->has('preevaluado') && $request->filled('preevaluado')) {$modulosMatriculado->preevaluado=$request->input('preevaluado');}
                if ($request->has('comentario') && $request->filled('comentario')) {$modulosMatriculado->comentario=$request->input('comentario');}

                if ($modulosMatriculado->save()) {
                    return response()->json(['message' => 'ModulosMatriculado updated successfully'], 200);
                } else {
                    return response()->json(['message' => 'Error, ModulosMatriculado wasn`t updated'], 500);
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
        $modulosMatriculado=ModulosMatriculado::find($id);
        if ($modulosMatriculado!=null) {
            if ($modulosMatriculado->delete()) {
                return response()->json(['message'=>'ModulosMatriculado '.$id.' deleted'],200);
            } else {
                return response()->json(['message'=>'Error when deleting ModulosMatriculado '.$id.'.'],500);
            }
        } else {
            return response()->json(['message'=>'There is no ModulosMatriculado '.$id.'.'],500);
        }
    }
}
     
