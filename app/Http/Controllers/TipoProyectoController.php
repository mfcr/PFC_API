<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoProyecto;
use Illuminate\Support\Facades\Validator;

class TipoProyectoController extends Controller
{
    public function search($value) {
        $r=Ciclo::where('tipo','like','%'.$value.'%')->get();
        if (sizeOf($r)==0) {
            return response()->json(['message'=>'No hay Tipos deProyecto con la cadena '.$value.' en su nombre.'],404);
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
        return response()->json(TipoProyecto::orderBy('id')->get(),200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),['tipo'=>'required|max:100']);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'Validation Error']);
        } else {
            //$tipoProyecto=TipoProyecto::create($data); 
            //OTRA OPCION
            $tipoProyecto=new TipoProyecto();
            $tipoProyecto->tipo=$request->input('tipo');

            if ($tipoProyecto->save()) {
                return response()->json(['message' => 'TipoProyecto created successfully','id'=>$tipoProyecto->id], 201);
            } else {
                return response()->json(['message' => 'Error, TipoProyecto wasn`t created'], 500);
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
        $tipoProyecto=TipoProyecto::find($id);
        if ($tipoProyecto==null) {
            return response()->json(['message'=>'TipoProyecto '.$id.' doesn`t exist'],404);
        } else {
            return response()->json($tipoProyecto,200);
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
        $tipoProyecto=TipoProyecto::find($id);
        if ($tipoProyecto==null) {
            return response()->json(['message'=>'TipoProyecto '.$id.' doesn`t exist'],404);
        } else {
	        $validator=Validator::make($request->all(),['tipo'=>'required|max:100']);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors().' Validation Error'],500);
            } else {
                //$tipoProyecto->update($request->all());
	            if ($request->has('tipo') && $request->filled('tipo')) {$tipoProyecto->tipo=$request->input('tipo');}

                if ($tipoProyecto->save()) {
                    return response()->json(['message' => 'TipoProyecto updated successfully'], 200);
                } else {
                    return response()->json(['message' => 'Error, TipoProyecto wasn`t updated'], 500);
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
        $tipoProyecto=TipoProyecto::find($id);
        if ($tipoProyecto!=null) {
            if ($tipoProyecto->delete()) {
                return response()->json(['message'=>'TipoProyecto '.$id.' deleted'],200);
            } else {
                return response()->json(['message'=>'Error when deleting TipoProyecto '.$id.'.'],500);
            }
        } else {
            return response()->json(['message'=>'There is no TipoProyecto '.$id.'.'],500);
        }
    }
}
        

