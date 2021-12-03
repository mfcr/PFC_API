<?php

namespace App\Http\Controllers;

use App\Models\Rubrica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RubricaController extends Controller
{
    public function search($value) {
        $r=Rubrica::where('rubrica','like','%'.$value.'%')->orWhere('descExcelente','like','%'.$value.'%')->orWhere('descBien','like','%'.$value.'%')->orWhere('descRegular','like','%'.$value.'%')->orWhere('descInsuficiente','like','%'.$value.'%')->get();
        if (sizeOf($r)==0) {
            return response()->json(['message'=>'No hay Rubricas con cadena '.$value.' en nombre o descripciones.'],404);
        } else {
            return response($r,200);
        }
    }

    public function rubricas_con_grupos($curso,$ciclo) {
        return response()->json(Rubrica::where('curso',$curso)->where('ciclo_id',$ciclo)->orderBy('grupo_rubrica_id')->orderBy('id')->with('grupo_rubricas')->get(),200);
    }

//----------  CRUD FUNCTIONS ------//
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Rubrica::orderBy('id')->get(),200);
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
            'ciclo_id'=>'required|numeric',
            'grupo_rubrica_id'=>'required|numeric',
            'rubrica'=>'required|max:200',
            'porcentaje'=>'numeric'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'Validation Error']);
        } else {

            //$rubrica=Rubrica::create($data); 
            //OTRA OPCION
            $rubrica=new Rubrica();
            $rubrica->curso=$request->input('curso');
            $rubrica->ciclo_id=$request->input('ciclo_id');
            $rubrica->grupo_rubrica_id=$request->input('grupo_rubrica_id');
            $rubrica->rubrica=$request->input('rubrica');
            $rubrica->porcentaje=$request->input('porcentaje');
            if ($request->has('descExcelente') && $request->filled('descExcelente')) {$rubrica->descExcelente=$request->input('descExcelente');}
            if ($request->has('descBien') && $request->filled('descBien')) {$rubrica->descBien=$request->input('descBien');}
            if ($request->has('descRegular') && $request->filled('descRegular')) {$rubrica->descRegular=$request->input('descRegular');}
            if ($request->has('descInsuficiente') && $request->filled('descInsuficiente')) {$rubrica->descInsuficiente=$request->input('descInsuficiente');}

            if ($rubrica->save()) {
                return response()->json(['message' => 'Rubrica created successfully','id'=>$rubrica->id], 201);
            } else {
                return response()->json(['message' => 'Error, Rubrica wasn`t created'], 500);
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
        $rubrica=Rubrica::find($id);
        if ($rubrica==null) {
            return response()->json(['message'=>'Rubrica '.$id.' doesn`t exist'],404);
        } else {
            return response()->json($rubrica,200);
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
        $rubrica=Rubrica::find($id);
        if ($rubrica==null) {
            return response()->json(['message'=>'Rubrica '.$id.' doesn`t exist'],404);
        } else {
            $validator=Validator::make($request->all(),[
                'curso'=>'numeric',
                'ciclo_id'=>'numeric',
                'grupo_rubrica_id'=>'numeric',
                'rubrica'=>'max:200',
                'porcentaje'=>'numeric'
            ]);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors().' Validation Error'],500);
            } else {
                //$rubrica->update($request->all());
                if ($request->has('curso') && $request->filled('curso')) {$rubrica->curso=$request->input('curso');}
                if ($request->has('ciclo_id') && $request->filled('ciclo_id')) {$rubrica->ciclo_id=$request->input('ciclo_id');}
                if ($request->has('grupo_rubrica_id') && $request->filled('grupo_rubrica_id')) {$rubrica->grupo_rubrica_id=$request->input('grupo_rubrica_id');}
                if ($request->has('rubrica') && $request->filled('rubrica')) {$rubrica->rubrica=$request->input('rubrica');}
                if ($request->has('porcentaje') && $request->filled('porcentaje')) {$rubrica->porcentaje=$request->input('porcentaje');}
                if ($request->has('descExcelente') && $request->filled('descExcelente')) {$rubrica->descExcelente=$request->input('descExcelente');}
                if ($request->has('descBien') && $request->filled('descBien')) {$rubrica->descBien=$request->input('descBien');}
                if ($request->has('descRegular') && $request->filled('descRegular')) {$rubrica->descRegular=$request->input('descRegular');}
                if ($request->has('descInsuficiente') && $request->filled('descInsuficiente')) {$rubrica->descInsuficiente=$request->input('descInsuficiente');}

                if ($rubrica->save()) {
                    return response()->json(['message' => 'Rubrica updated successfully'], 200);
                } else {
                    return response()->json(['message' => 'Error, Rubrica wasn`t updated'], 500);
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
        $rubrica=Rubrica::find($id);
        if ($rubrica!=null) {
            if ($rubrica->delete()) {
                return response()->json(['message'=>'Rubrica '.$id.' deleted'],200);
            } else {
                return response()->json(['message'=>'Error when deleting Rubrica '.$id.'.'],500);
            }
        } else {
            return response()->json(['message'=>'There is no Rubrica '.$id.'.'],500);
        }
    }
}
       
