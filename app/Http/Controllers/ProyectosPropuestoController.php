<?php

namespace App\Http\Controllers;

use App\Models\ProyectosPropuesto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class ProyectosPropuestoController extends Controller
{
     
    public function search($ciclo,$leido,$return) {
        //$ciclo puede ser un ciclo_id concreto o -1 si todos.
        //leido flase (no leidos) ,true (todos)
        //$return todo o cuenta.
        $r=null;
        if ($ciclo==-1) {
            $r=ProyectosPropuesto::where('ciclo_id','>',-1);
        } else {
            $r=ProyectosPropuesto::where('ciclo_id',$ciclo);
        }

        if ($leido==0) { $r=$r->where('leido',false);}
        $r=$r->get();
        if (sizeOf($r)==0 && $return!='cuenta') {
            return response()->json(['message'=>'No hay ProyectosProuestos con esas características.'],404);
        } else {
            if ($return=='todo') {
                return response($r,200);
            } elseif ($return=='cuenta') {
                return response(sizeof($r),200);
            } else {
                return response()->json(['message'=>'Error en el tipo de valor a devolver '.$return],404);    
            }
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
        return response()->json(ProyectosPropuesto::orderBy('id','DESC')->get(),200);
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
            'nombre'=>'max:100',
            'email'=>'required|max:50',
            'propuesta'=>'required',
            'ciclo_id'=>'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'Validation Error']);
        } else {
            //$proyectosPropuesto=ProyectosPropuesto::create($data); 
            //OTRA OPCION
            $proyectosPropuesto=new ProyectosPropuesto();
            if ($request->has('nombre') && $request->filled('nombre')) {$proyectosPropuesto->nombre=$request->input('nombre');}
            $proyectosPropuesto->email=$request->input('email');
            $proyectosPropuesto->propuesta=$request->input('propuesta');
            $proyectosPropuesto->ciclo_id=$request->input('ciclo_id');

            if ($proyectosPropuesto->save()) {
                return response()->json(['message' => 'ProyectosPropuesto created successfully','id'=>$proyectosPropuesto->id], 201);
            } else {
                return response()->json(['message' => 'Error, ProyectosPropuesto wasn`t created'], 500);
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
        $proyectosPropuesto=ProyectosPropuesto::find($id);
        if ($proyectosPropuesto==null) {
            return response()->json(['message'=>'Propuesta de Proyecto '.$id.' doesn`t exist'],404);
        } else {
            return response()->json($proyectosPropuesto,200);
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

        $proyectosPropuesto=ProyectosPropuesto::find($id);
        if ($proyectosPropuesto==null) {
            return response()->json(['message'=>'Propuesta de Proyecto '.$id.' doesn`t exist'],404);
        } else {
            $validator=Validator::make($request->all(),[
                'nombre'=>'max:100', 'email'=>'max:50'
            ]);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors().' Validation Error'],500);
            } else {



                //$proyectosPropuesto->update($request->all());
                if ($request->has('ciclo_id') && $request->filled('ciclo_id')) {
                    $proyectosPropuesto->ciclo_id=$request->input('ciclo_id');
                }
                if ($request->has('propuesta') && $request->filled('propuesta')) {
                    $proyectosPropuesto->propuesta=$request->input('propuesta');}

                if ($request->has('nombre') && $request->filled('nombre')) {
                    $proyectosPropuesto->nombre=$request->input('nombre');}
                if ($request->has('email') && $request->filled('email')) {
                    $proyectosPropuesto->email=$request->input('email');} 
                if ($request->has('leido') && $request->filled('leido')) {
                    $proyectosPropuesto->leido=$request->input('leido');}
                if ($proyectosPropuesto->save()) {
                    return response()->json(['message' => 'Proyecto Propuesto updated successfully'], 200);
                } else {
                    return response()->json(['message' => 'Error, Proyecto Propuesto wasn`t updated'], 500);
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
        $proyectosPropuesto=ProyectosPropuesto::find($id);
        if ($proyectosPropuesto!=null) {
            if ($proyectosPropuesto->delete()) {
                return response()->json(['message'=>'ProyectosPropuesto '.$id.' deleted'],200);
            } else {
                return response()->json(['message'=>'Error when deleting ProyectosPropuesto '.$id.'.'],500);
            }
        } else {
            return response()->json(['message'=>'There is no ProyectosPropuesto '.$id.'.'],500);
        }
    }
}
