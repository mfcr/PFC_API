<?php

namespace App\Http\Controllers;

use App\Models\Fecha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FechaController extends Controller
{

    public function filter($year) {
        if ($year!='0') {
            $r=Fecha::where('curso',$year)->get();
            if (sizeOf($r)==0) {
                return response()->json(['message'=>'No hay Fechas del curso '.$year],404);
            } else {
                return response($r,200);
            }
        } else {
            return $this->index();
        }
    }

    public function liveSend($year) {
        $r=Fecha::where('curso',$year)->where('enviar',true)->where('enviado',false)->get();
        if (sizeOf($r)==0) {
            return response()->json(['message'=>'No hay Fechas pendientes de envio de mensajes este curso.'],404);
        } else {
            return response($r,200);
        }

    }

    public function filter2($year,$value) {
        if ($year!='0') {
            $r=Fecha::where('curso',$year)->where(function ($query) use ($value) {
                $query->where('nombre','like','%'.$value.'%')->orWhere('descripcion','like','%'.$value.'%');})->get();

            if (sizeOf($r)==0) {
                return response()->json(['message'=>'No hay Fechas del curso '.$year.' con '.$value.' en nombre o descripcion.'],404);
            } else {
                return response($r,200);
            }
        } else {
            return $this->search($value);
        }
    }

    public function copy($year1,$year2) {


        $old=Fecha::where('curso',$year1)->get();
        foreach ($old as $o) {
             $nuevo=new Fecha();
             $nuevo->curso=$year2;
             $nuevo->nombre=$o->nombre;
             $nuevo->enviar=$o->enviar;
             $nuevo->fechaLimite=$o->fechaLimite; 
             $nuevo->enviado=false;
             $nuevo->diasParaAviso=$o->diasParaAviso;
             $nuevo->save();
         }
         return response()->json(['message'=>sizeOf($old).' Nuevas fechas creadas.'],200);


    }

    public function search($value) {
        $r=Fecha::where('nombre','like','%'.$value.'%')->orWhere('descripcion','like','%'.$value.'%')->get();
        if (sizeOf($r)==0) {
            return response()->json(['message'=>'No hay Fechas con la cadena '.$value.' en nombre o descripcion.'],404);
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
        return response()->json(Fecha::orderBy('fechaLimite')->get(),200);
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
            'curso'=>'required|numeric',
            'nombre'=>'required|max:100',
            'enviar'=>'boolean',
            'fechaLimite'=>'required|date',
            'enviado'=>'boolean'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'Validation Error']);
        } else {

            //$fecha=Fecha::create($data); 
            //OTRA OPCION
            $fecha=new Fecha();
            $fecha->curso=$request->input('curso');
            $fecha->nombre=$request->input('nombre');
            $fecha->fechaLimite=$request->input('fechaLimite');
            if ($request->has('descripcion') && $request->filled('descripcion')) {$fecha->descripcion=$request->input('descripcion');}
            if ($request->has('enviar') && $request->filled('enviar')) {$fecha->enviar=$request->input('enviar');}
            if ($request->has('enviado') && $request->filled('enviado')) {$fecha->enviado=$request->input('enviado');}
            if ($request->has('diasParaAviso') && $request->filled('diasParaAviso')) {$fecha->diasParaAviso=$request->input('diasParaAviso');}

            if ($fecha->save()) {
                return response()->json(['message' => 'Fecha created successfully','id'=>$fecha->id], 201);
            } else {
                return response()->json(['message' => 'Error, Fecha wasn`t created'], 500);
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
        $fecha=Fecha::find($id);
        if ($fecha==null) {
            return response()->json(['message'=>'Fecha '.$id.' doesn`t exist'],404);
        } else {
            return response()->json($fecha,200);
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
        $fecha=Fecha::find($id);
        if ($fecha==null) {
            return response()->json(['message'=>'Fecha '.$id.' doesn`t exist'],404);
        } else {
            $validator=Validator::make($request->all(),[
                'curso'=>'numeric',
                'nombre'=>'max:100',
                'enviar'=>'boolean',
                'fechaLimite'=>'date',
                'enviado'=>'boolean'
            ]);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors().' Validation Error'],500);
            } else {
                //$fecha->update($request->all());
                if ($request->has('curso') && $request->filled('curso')) {$fecha->curso=$request->input('curso');}
                if ($request->has('nombre') && $request->filled('nombre')) {$fecha->nombre=$request->input('nombre');}
                if ($request->has('fechaLimite') && $request->filled('fechaLimite')) {$fecha->fechaLimite=$request->input('fechaLimite');}
                if ($request->has('descripcion') && $request->filled('descripcion')) {$fecha->descripcion=$request->input('descripcion');}
                if ($request->has('enviar') && $request->filled('enviar')) {$fecha->enviar=$request->input('enviar');}
                if ($request->has('enviado') && $request->filled('enviado')) {$fecha->enviado=$request->input('enviado');}
                if ($request->has('diasParaAviso') && $request->filled('diasParaAviso')) {$fecha->diasParaAviso=$request->input('diasParaAviso');}

                if ($fecha->save()) {
                    return response()->json(['message' => 'Fecha updated successfully'], 200);
                } else {
                    return response()->json(['message' => 'Error, Fecha wasn`t updated'], 500);
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
        $fecha=Fecha::find($id);
        if ($fecha!=null) {
            if ($fecha->delete()) {
                return response()->json(['message'=>'Fecha '.$id.' deleted'],200);
            } else {
                return response()->json(['message'=>'Error when deleting Fecha '.$id.'.'],500);
            }
        } else {
            return response()->json(['message'=>'There is no Fecha '.$id.'.'],500);
        }
    }
}    

