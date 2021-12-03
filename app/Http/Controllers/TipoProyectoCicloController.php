<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoProyectoCiclo;
use Illuminate\Support\Facades\Validator;

class TipoProyectoCicloController extends Controller
{

    public function tipos_proyecto_ciclos_con_tipos($ciclo_id) {
        return response()->json(TipoProyectoCiclo::where('ciclo_id',$ciclo_id)->with('tipo_proyectos')->orderBy('id')->get(),200);
    }


//----------  CRUD FUNCTIONS ------//
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(TipoProyectoCiclo::orderBy('id')->get(),200);
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
            'ciclo_id'=>'required|numeric',
            'tipo_proyecto_id'=>'required|numeric'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'Validation Error']);
        } else {
            //$tipoProyectoCiclo=TipoProyectoCiclo::create($data); 
            //OTRA OPCION
            $tipoProyectoCiclo=new TipoProyectoCiclo();
            $tipoProyectoCiclo->ciclo_id=$request->input('ciclo_id');
            $tipoProyectoCiclo->tipo_proyecto_id=$request->input('tipo_proyecto_id');

            if ($tipoProyectoCiclo->save()) {
                return response()->json(['message' => 'TipoProyectoCiclo created successfully','id'=>$tipoProyectoCiclo->id], 201);
            } else {
                return response()->json(['message' => 'Error, TipoProyectoCiclo wasn`t created'], 500);
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
        $tipoProyectoCiclo=TipoProyectoCiclo::find($id);
        if ($tipoProyectoCiclo==null) {
            return response()->json(['message'=>'TipoProyectoCiclo '.$id.' doesn`t exist'],404);
        } else {
            return response()->json($tipoProyectoCiclo,200);
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
        $tipoProyectoCiclo=TipoProyectoCiclo::find($id);
        if ($tipoProyectoCiclo==null) {
            return response()->json(['message'=>'TipoProyectoCiclo '.$id.' doesn`t exist'],404);
        } else {
	        $validator=Validator::make($request->all(),[
	            'ciclo_id'=>'numeric',
	            'tipo_proyecto_id'=>'numeric'
	        ]);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors().' Validation Error'],500);
            } else {
                //$altipoProyectoCicloumno->update($request->all());
	            if ($request->has('ciclo_id') && $request->filled('ciclo_id')) {$tipoProyectoCiclo->ciclo_id=$request->input('ciclo_id');}
	            if ($request->has('tipo_proyecto_id') && $request->filled('tipo_proyecto_id')) {$tipoProyectoCiclo->tipo_proyecto_id=$request->input('tipo_proyecto_id');}

                if ($tipoProyectoCiclo->save()) {
                    return response()->json(['message' => 'TipoProyectoCiclo updated successfully'], 200);
                } else {
                    return response()->json(['message' => 'Error, TipoProyectoCiclo wasn`t updated'], 500);
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
        $tipoProyectoCiclo=TipoProyectoCiclo::find($id);
        if ($tipoProyectoCiclo!=null) {
            if ($tipoProyectoCiclo->delete()) {
                return response()->json(['message'=>'TipoProyectoCiclo '.$id.' deleted'],200);
            } else {
                return response()->json(['message'=>'Error when deleting TipoProyectoCiclo '.$id.'.'],500);
            }
        } else {
            return response()->json(['message'=>'There is no TipoProyectoCiclo '.$id.'.'],500);
        }
    }
}
    
