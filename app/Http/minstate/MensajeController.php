<?php

namespace App\Http\Controllers;

use App\Models\Mensaje;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MensajeController extends Controller
{
    public function search($value) {
        $r=Mensaje::where('cabecera','like','%'.$value.'%')->orWhere('cuerpo','like','%'.$value.'%')->get();
        if (sizeOf($r)==0) {
            return response()->json(['message'=>'No hay Mensajes con la cadena '.$value.' en cabecera o cuerpo.'],404);
        } else {
            return response($r,200);
        }
    }

    public function mensajesEnhanced($type,$id,$return,$proyecto) {
        //$type puede ser alumno, docente. 
        //$return puede ser todo, enviado, recibido, no_leido, cuenta  
        $r=null;
        if ($type=='alumno') {
            $envio='alumno_id';
            $direccion=true;
        } elseif ($type=='docente') {
            $envio='docente_id';
            $direccion=false;
        } else {
            return response()->json(['message'=>'No hay Mensajes para ese tipo '.$type],404);
        }
//@@@ aqui se puede añadir otra/s opcion/es para devolver con cada mensaje el proyecto, el alumno, y el docente. ruet ej: alumno/2/todo/true/true/true

        $r=Mensaje::where($envio,'=',$id);
        if ($proyecto>-1) {
            $r=$r->where('proyecto_id',$proyecto);
        }
        if ($return=='todo') {
            $r=$r->get();
        } elseif ($return=="enviado") {
            $r=$r->where('alum_a_tut',$direccion)->get();
        } elseif ($return=='recibido') {
            $r=$r->where('alum_a_tut',!$direccion)->get();
        } elseif ($return=='no_leido') {
            $r=$r->where('alum_a_tut',!$direccion)->where('leido',false)->get();
        } elseif ($return=='cuenta') {
            $r=$r->where('alum_a_tut',!$direccion)->where('leido',false)->get();
            return response(sizeof($r),200);
        } else {
            return response()->json(['message'=>'Error en el tipo de valor devuelto '.$return],404);    
        }

        if (sizeOf($r)==0) {
            return response()->json(['message'=>'No hay Mensajes con esas características.'],404);
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
        return response()->json(Mensaje::orderBy('id')->get(),200);
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
            'alumno_id'=>'numeric',
            'docente_id'=>'numeric',
            'alum_a_tut'=>'boolean',
            'cabecera'=>'required|max:100',
            'cuerpo'=>'required',
            'leido'=>'boolean'        
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'Validation Error']);
        } else {

            //$mensaje=Mensaje::create($data); 
            //OTRA OPCION
            $mensaje=new Mensaje();
            $mensaje->proyecto_id=$request->input('proyecto_id');
            $mensaje->cabecera=$request->input('cabecera');
            $mensaje->cuerpo=$request->input('cuerpo');
            if ($request->has('alumno_id') && $request->filled('alumno_id')) {$mensaje->alumno_id=$request->input('alumno_id');}
            if ($request->has('docente_id') && $request->filled('docente_id')) {$mensaje->docente_id=$request->input('docente_id');}
            if ($request->has('alum_a_tut') && $request->filled('alum_a_tut')) {$mensaje->alum_a_tut=$request->input('alum_a_tut');}
            if ($request->has('leido') && $request->filled('leido')) {$mensaje->leido=$request->input('leido');}

            if ($mensaje->save()) {
                return response()->json(['message' => 'Mensaje created successfully','id'=>$mensaje->id], 201);
            } else {
                return response()->json(['message' => 'Error, Mensaje wasn`t created'], 500);
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
        $mensaje=Mensaje::find($id);
        if ($mensaje==null) {
            return response()->json(['message'=>'Mensaje '.$id.' doesn`t exist'],404);
        } else {
            return response()->json($mensaje,200);
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
        $mensaje=Mensaje::find($id);
        if ($mensaje==null) {
            return response()->json(['message'=>'Mensaje '.$id.' doesn`t exist'],404);
        } else {
            $validator=Validator::make($request->all(),[
                'proyecto_id'=>'numeric',
                'alumno_id'=>'numeric',
                'docente_id'=>'numeric',
                'alum_a_tut'=>'boolean',
                'cabecera'=>'max:100',
                'leido'=>'boolean'        
            ]);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors().' Validation Error'],500);
            } else {
                //$mensaje->update($request->all());
                if ($request->has('proyecto_id') && $request->filled('proyecto_id')) {$mensaje->proyecto_id=$request->input('proyecto_id');}
                if ($request->has('cabecera') && $request->filled('cabecera')) {$mensaje->cabecera=$request->input('cabecera');}
                if ($request->has('cuerpo') && $request->filled('cuerpo')) {$mensaje->cuerpo=$request->input('cuerpo');}
                if ($request->has('alumno_id') && $request->filled('alumno_id')) {$mensaje->alumno_id=$request->input('alumno_id');}
                if ($request->has('docente_id') && $request->filled('docente_id')) {$mensaje->docente_id=$request->input('docente_id');}
                if ($request->has('alum_a_tut') && $request->filled('alum_a_tut')) {$mensaje->alum_a_tut=$request->input('alum_a_tut');}
                if ($request->has('leido') && $request->filled('leido')) {$mensaje->leido=$request->input('leido');}

                if ($mensaje->save()) {
                    return response()->json(['message' => 'Mensaje updated successfully'], 200);
                } else {
                    return response()->json(['message' => 'Error, Mensaje wasn`t updated'], 500);
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
        $mensaje=Mensaje::find($id);
        if ($mensaje!=null) {
            if ($mensaje->delete()) {
                return response()->json(['message'=>'Mensaje '.$id.' deleted'],200);
            } else {
                return response()->json(['message'=>'Error when deleting Mensaje '.$id.'.'],500);
            }
        } else {
            return response()->json(['message'=>'There is no Mensaje '.$id.'.'],500);
        }
    }
}

