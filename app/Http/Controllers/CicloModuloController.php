<?php

namespace App\Http\Controllers;

use App\Models\CicloModulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CicloModuloController extends Controller
{

    public function has($ciclo,$modulo) {
        if (sizeOf(CicloModulo::where('ciclo_id',$ciclo)->where('modulo_id',$modulo)->get())>0) {
            return true;
        } else {
            return false;
        }
    }


    public function ciclos_modulos_nombres() {
        return response()->json(CicloModulo::with('ciclos')->with('modulos')->orderBy('ciclo_id')->get(),200);

    }



//----------  CRUD FUNCTIONS ------//
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(CicloModulo::orderBy('id')->get(),200);
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
            'modulo_id'=>'required|numeric',
            'ciclo_id'=>'required|numeric'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'Validation Error']);
        } else {

            //$cicloModulo=CicloModulo::create($data); 
            //OTRA OPCION
            $cicloModulo=new CicloModulo();
            $cicloModulo->modulo_id=$request->input('modulo_id');
            $cicloModulo->ciclo_id=$request->input('ciclo_id');

            if ($cicloModulo->save()) {
                return response()->json(['message' => 'CicloModulo created successfully','id'=>$cicloModulo->id], 201);
            } else {
                return response()->json(['message' => 'Error, CicloModulo wasn`t created'], 500);
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
        $cicloModulo=CicloModulo::find($id);
        if ($cicloModulo==null) {
            return response()->json(['message'=>'CicloModulo '.$id.' doesn`t exist'],404);
        } else {
            return response()->json($cicloModulo,200);
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
        $cicloModulo=CicloModulo::find($id);
        if ($cicloModulo==null) {
            return response()->json(['message'=>'CicloModulo '.$id.' doesn`t exist'],404);
        } else {
            $validator=Validator::make($request->all(),[
                'modulo_id'=>'numeric',
                'ciclo_id'=>'numeric'
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors(), 'Validation Error']);
            } else {
                //$cicloModulo=CicloModulo::create($data); 
                //OTRA OPCION
                if ($request->has('modulo_id') && $request->filled('modulo_id')) {$cicloModulo->modulo_id=$request->input('modulo_id');}
                if ($request->has('ciclo_id') && $request->filled('ciclo_id')) {$cicloModulo->ciclo_id=$request->input('ciclo_id');}
                if ($cicloModulo->save()) {
                    return response()->json(['message' => 'CicloModulo updated successfully'], 200);
                } else {
                    return response()->json(['message' => 'Error, CicloModulo wasn`t updated'], 500);
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
       $cicloModulo=CicloModulo::find($id);
        if ($cicloModulo!=null) {
            if ($cicloModulo->delete()) {
                return response()->json(['message'=>'CicloModulo '.$id.' deleted'],200);
            } else {
                return response()->json(['message'=>'Error when deleting CicloModulo '.$id.'.'],500);
            }
        } else {
            return response()->json(['message'=>'There is no CicloModulo '.$id.'.'],500);
        }

    }
}
