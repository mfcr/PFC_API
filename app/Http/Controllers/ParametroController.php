<?php

namespace App\Http\Controllers;

use App\Models\Parametro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ParametroController extends Controller
{

//NOTA: este controller es distitno al resto NO ES CRUD.
    // solo se permite recoger el único registro del mismo y editarlo. No se contempla borrado ni nuevos registros.


//----------  CRUD FUNCTIONS: ELIMINADAS FUNCIONES DE BORRADO Y CREACION DE NUEVOS REGISTROS. SOLO SE PERMITE VER Y EDITAR EL UNICO REGISTRO ------//
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Parametro::first(),200);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $parametros=Parametro::first();
        if ($parametros==null) {
            return response()->json(['message'=>'No existe registro de parametros.'],404);
        } else {

            $validator=Validator::make($request->all(),[
                'cursoActual'=>'numeric']);
                //'ultimoCheckMensajes'=>'date'
            //]);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors().' Validation Error'],500);
            } else {

                //$proyectosPropuesto->update($request->all());
                if ($request->has('cursoActual') && $request->filled('cursoActual')) {$parametros->cursoActual=$request->input('cursoActual');}
              //  if ($request->has('ultimoCheckMensajes') && $request->filled('ultimoCheckMensajes')) {$parametros->ultimoCheckMensajes=$request->input('ultimoCheckMensajes');}


                if ($parametros->save()) {
                    return response()->json(['message' => 'Parametros updated successfully'], 200);
                } else {
                    return response()->json(['message' => 'Error, Parametros werent updated'], 500);
                }
            }
        }
    }

}
