<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DocGenreal;

class DocGeneralController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(DocGeneral::all(),200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	//@@@ OJO AQUI FALTAN CAMBIOS PORQUE LO QUE SE RECIBE NO ES LA URI, ES UN FICHERO --> AQUI HAY QUE RECIBITR EL FICHERO, GUARDARLO A DISCO Y CREAR LA URI.
    	//@@@ OJO O SE CREA UNA CARPETA PARA CADA PROYECTO/CICLO/ETC O PROBLEMA REPETICION NOMBRES. POSSIBLE SOLUCION AÑADIR AL FICHERO LA FECHAYHORA
    	//@@@ademas tb puede que reciba una URL de verdad
        $data->$request->all();
        $validator=Validator::make($data,[
            'nombre'=>'required|max:100',
            'tipo'=>'required',
            'uri'=>'max:200'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'Validation Error']);
        } else {

            //$docGeneral=DocGeneral::create($data); 
            //OTRA OPCION
            $docGeneral=new DocGeneral();
            $docGeneral->nombre=$request->input('nombre');
            $docGeneral->tipo=$request->input('tipo');
            if ($request->has('descripcion') && $request->filled('descripcion')) {$docGeneral->descripcion=$request->input('descripcion');}
            if ($request->has('telefono') && $request->filled('telefono')) {$docGeneral->telefono=$request->input('telefono');}
            if ($request->has('uri') && $request->filled('uri')) {$docGeneral->uri=$request->input('uri');}

            if ($docGeneral->save()) {
                return response()->json(['message' => 'DocGeneral created successfully'], 201);
            } else {
                return response()->json(['message' => 'Error, DocGeneral wasn`t created'], 500);
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
        $docGeneral=DocGeneral::find($id);
        if ($docGeneral===null) {
            return response()->json(['message'=>'DocGeneral '.$id.' doesn`t exist'],404);
        } else {
            return response()->json($docGeneral,200);
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
    	//@@@ OJO AQUI FALTAN CAMBIOS PORQUE LO QUE SE RECIBE NO ES LA URI, ES UN FICHERO --> AQUI HAY QUE RECIBITR EL FICHERO, GUARDARLO A DISCO Y CREAR LA URI.
    	//@@@ OJO O SE CREA UNA CARPETA PARA CADA PROYECTO/CICLO/ETC O PROBLEMA REPETICION NOMBRES. POSSIBLE SOLUCION AÑADIR AL FICHERO LA FECHAYHORA
    	//@@@ademas tb puede que reciba una URL de verdad
        $docGeneral=DocGeneral::find($id);
        if ($docGeneral===null) {
            return response()->json(['message'=>'DocGeneral '.$id.' doesn`t exist'],404);
        } else {
	        $data->$request->all();
	        $validator=Validator::make($data,['nombre'=>'max:100','uri'=>'max:200']);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors().' Validation Error'],500);
            } else {
                //$docGeneral->update($request->all());
	            if ($request->has('nombre') && $request->filled('nombre')) {$docGeneral->nombre=$request->input('nombre');}
	            if ($request->has('tipo') && $request->filled('tipo')) {$docGeneral->tipo=$request->input('tipo');}
	            if ($request->has('descripcion') && $request->filled('descripcion')) {$docGeneral->descripcion=$request->input('descripcion');}
	            if ($request->has('telefono') && $request->filled('telefono')) {$docGeneral->telefono=$request->input('telefono');}
	            if ($request->has('uri') && $request->filled('uri')) {$docGeneral->uri=$request->input('uri');}

                if ($docGeneral->save()) {
                    return response()->json(['message' => 'DocGeneral updated successfully'], 200);
                } else {
                    return response()->json(['message' => 'Error, DocGeneral wasn`t updated'], 500);
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
        $docGeneral=DocGeneral::find($id);
        if ($docGeneral->delete()) {
            return response()->json(['message'=>'DocGeneral '.$id.' deleted'],200);
        } else {
            return response()->json(['message'=>'Error when deleting DocGeneral '.$id.'.'],500);
        }
    }
}

