<?php

namespace App\Http\Controllers;

use App\Models\EstadosProyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EstadosProyectoController extends Controller
{


//----------  CRUD FUNCTIONS ------//
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(EstadosProyecto::orderBy('id')->get(),200);
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
            'estado'=>'required|max:70'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'Validation Error']);
        } else {

            //$fecha=Fecha::create($data); 
            //OTRA OPCION
            $estado=new EstadosProyecto();
            $estado->estado=$request->input('estado');

            if ($estado->save()) {
                return response()->json(['message' => 'EstadoProyecto created successfully','id'=>$estado->id], 201);
            } else {
                return response()->json(['message' => 'Error, EstadoProyecto wasn`t created'], 500);
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
        $estado=EstadosProyecto::find($id);
        if ($estado==null) {
            return response()->json(['message'=>'EstadoProyecto '.$id.' doesn`t exist'],404);
        } else {
            return response()->json($estado,200);
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
        $estado=EstadosProyecto::find($id);
        if ($estado==null) {
            return response()->json(['message'=>'EstadoProyecto '.$id.' doesn`t exist'],404);
        } else {
            $validator=Validator::make($request->all(),[                'estado'=>'max:70'            ]);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors().' Validation Error'],500);
            } else {
                if ($request->has('estado') && $request->filled('estado')) {$estado->estado=$request->input('estado');}
                if ($estado->save()) {
                    return response()->json(['message' => 'EstadoProyecto updated successfully'], 200);
                } else {
                    return response()->json(['message' => 'Error, EstadoProyecto wasn`t updated'], 500);
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
        $estado=EstadosProyecto::find($id);
        if ($estado!=null) {
            if ($estado->delete()) {
                return response()->json(['message'=>'EstadoProyecto '.$id.' deleted'],200);
            } else {
                return response()->json(['message'=>'Error when deleting EstadoProyecto '.$id.'.'],500);
            }
        } else {
            return response()->json(['message'=>'There is no EstadoProyecto '.$id.'.'],500);
        }
    }
}    
