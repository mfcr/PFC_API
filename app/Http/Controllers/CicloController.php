<?php

namespace App\Http\Controllers;

use App\Models\Ciclo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CicloController extends Controller
{

    public function search($value) {
        $r=Ciclo::where('codigoCiclo','like','%'.$value.'%')->orWhere('nombreCiclo','like','%'.$value.'%')->get();
        if (sizeOf($r)==0) {
            return response()->json(['message'=>'No hay Ciclos con la cadena '.$value.' en codigo o nombre.'],404);
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
        return response()->json(Ciclo::orderBy('id')->get(),200);
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
            'codigoCiclo'=>'required|unique:ciclos|max:20',
            'nombreCiclo'=>'required|max:200'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'Validation Error'],400);
        } else {
            //$ciclo=Ciclo::create($data); 
            //OTRA OPCION
            $ciclo=new Ciclo();
            $ciclo->codigoCiclo=$request->input('codigoCiclo');
            $ciclo->nombreCiclo=$request->input('nombreCiclo');
            if ($request->has('descripcion') && $request->filled('descripcion')) {$ciclo->descripcion=$request->input('descripcion');}

            if ($ciclo->save()) {
                return response()->json(['message' => 'Ciclo created successfully','id'=>$ciclo->id], 201);
            } else {
                return response()->json(['message' => 'Error, Ciclo wasn`t created'], 500);
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
        $ciclo=Ciclo::find($id);
        if ($ciclo==null) {
            return response()->json(['message'=>'Ciclo '.$id.' doesn`t exist'],404);
        } else {
            return response($ciclo,200);
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
        $ciclo=Ciclo::find($id);
        if ($ciclo==null) {
            return response()->json(['message'=>'Ciclo '.$id.' doesn`t exist'],404);
        } else {

            $validator=Validator::make($request->all(),[
                'codigoCiclo'=>'max:20',
                'nombreCiclo'=>'max:200']);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors(), 'Validation Error']);
            } else {
                //$ciclo->update($request->all());
                if ($request->has('codigoCiclo') && $request->filled('codigoCiclo') && $request->input('codigoCiclo')!=$ciclo->codigoCiclo) {$ciclo->codigoCiclo=$request->input('codigoCiclo');}
                if ($request->has('nombreCiclo') && $request->filled('nombreCiclo') && $request->input('nombreCiclo')!=$ciclo->nombreCiclo) {$ciclo->nombreCiclo=$request->input('nombreCiclo');}
                if ($request->has('descripcion') && $request->filled('descripcion') && $request->input('descripcion')!=$ciclo->descripcion) {$ciclo->descripcion=$request->input('descripcion');}
                if ($ciclo->save()) {
                    return response()->json(['message' => 'Ciclo updated successfully'], 201);
                } else {
                    return response()->json(['message' => 'Error, Ciclo wasn`t updated'], 500);
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
        $ciclo=Ciclo::find($id);
        if ($ciclo!=null) {
            if ($ciclo->delete()) {
                return response()->json(['message'=>'Ciclo '.$id.' deleted'],200);
            } else {
                return response()->json(['message'=>'Error when deleting Ciclo '.$id.'.'],500);
            }
        } else {
            return response()->json(['message'=>'There is no Ciclo '.$id.'.'],500);
        }
    }
}
