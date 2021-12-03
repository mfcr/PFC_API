<?php

namespace App\Http\Controllers;

use App\Models\DocenteImparteModulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DocenteImparteModuloController extends Controller
{
     

    public function searchDocente ($docente_id,$curso) {
        $docenteImparteModulo=DocenteImparteModulo::with('modulos')->with('ciclos')->with('ciclo_modulos')->where('curso','=',$curso)->where('docente_id','=',$docente_id)->get();
        if ($docenteImparteModulo==null) {
            return response()->json(['message'=>'DocenteImparteModulo '.$id.' doesn`t exist'],404);
        } else {
            return response()->json($docenteImparteModulo,200);
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
        return response()->json(DocenteImparteModulo::orderBy('id')->get(),200);
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
            'docente_id'=>'required|numeric',
            'ciclo_modulo_id'=>'required|numeric',
            'curso'=>'required|numeric'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'Validation Error']);
        } else {
            //$docenteImparteModulo=DocenteImparteModulo::create($data); 
            //OTRA OPCION
            $docenteImparteModulo=new DocenteImparteModulo();
            $docenteImparteModulo->docente_id=$request->input('docente_id');
            $docenteImparteModulo->ciclo_modulo_id=$request->input('ciclo_modulo_id');
            $docenteImparteModulo->curso=$request->input('curso');

            if ($docenteImparteModulo->save()) {
                return response()->json(['message' => 'DocenteImparteModulo created successfully','id'=>$docenteImparteModulo->id], 201);
            } else {
                return response()->json(['message' => 'Error, DocenteImparteModulo wasn`t created'], 500);
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
        $docenteImparteModulo=DocenteImparteModulo::find($id);
        if ($docenteImparteModulo==null) {
            return response()->json(['message'=>'DocenteImparteModulo '.$id.' doesn`t exist'],404);
        } else {
            return response()->json($docenteImparteModulo,200);
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

        $docenteImparteModulo=DocenteImparteModulo::find($id);
        if ($docenteImparteModulo==null) {
            return response()->json(['message'=>'DocenteImparteModulo '.$id.' doesn`t exist'],404);
        } else {
            $validator=Validator::make($request->all(),[
                'docente_id'=>'numeric',
                'ciclo_modulo_id'=>'numeric',
                'curso'=>'numeric'
            ]);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors(),' Validation Error'],500);
            } else {
                //$docenteImparteModulo->update($request->all());
                if ($request->has('docente_id') && $request->filled('docente_id')) {$docenteImparteModulo->docente_id=$request->input('docente_id');}
                if ($request->has('ciclo_modulo_id') && $request->filled('ciclo_modulo_id')) {$docenteImparteModulo->ciclo_modulo_id=$request->input('ciclo_modulo_id');}
                if ($request->has('curso') && $request->filled('curso')) {$docenteImparteModulo->curso=$request->input('curso');}

                if ($docenteImparteModulo->save()) {
                    return response()->json(['message' => 'DocenteImparteModulo updated successfully'], 201);
                } else {
                    return response()->json(['message' => 'Error, DocenteImparteModulo wasn`t updated'], 500);
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
        $docenteImparteModulo=DocenteImparteModulo::find($id);
        if ($docenteImparteModulo!=null) {
            if ($docenteImparteModulo->delete()) {
                return response()->json(['message'=>'DocenteImparteModulo '.$id.' deleted'],200);
            } else {
                return response()->json(['message'=>'Error when deleting DocenteImparteModulo '.$id.'.'],500);
            }
        } else {
            return response()->json(['message'=>'There is no DocenteImparteModulo '.$id.'.'],500);
        }
    }
}
