<?php

namespace App\Http\Controllers;

use App\Models\GrupoRubrica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GrupoRubricaController extends Controller
{


//----------  CRUD FUNCTIONS ------//
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(GrupoRubrica::orderBy('id')->get(),200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),['grupo'=>'required|max:40']);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'Validation Error']);
        } else {
            //$grupoRubrica=GrupoRubrica::create($data); 
            //OTRA OPCION
            $grupoRubrica=new GrupoRubrica();
            $grupoRubrica->grupo=$request->input('grupo');

            if ($grupoRubrica->save()) {
                return response()->json(['message' => 'GrupoRubrica created successfully','id'=>$grupoRubrica->id], 201);
            } else {
                return response()->json(['message' => 'Error, GrupoRubrica wasn`t created'], 500);
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
        $grupoRubrica=GrupoRubrica::find($id);
        if ($grupoRubrica==null) {
            return response()->json(['message'=>'GrupoRubrica '.$id.' doesn`t exist'],404);
        } else {
            return response()->json($grupoRubrica,200);
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
        $grupoRubrica=GrupoRubrica::find($id);
        if ($grupoRubrica==null) {
            return response()->json(['message'=>'GrupoRubrica '.$id.' doesn`t exist'],404);
        } else {
            $validator=Validator::make($request->all(),['grupo'=>'max:40']);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors().' Validation Error'],500);
            } else {
                //$grupoRubrica->update($request->all());
                if ($request->has('grupo') && $request->filled('grupo')) {$grupoRubrica->grupo=$request->input('grupo');}

                if ($grupoRubrica->save()) {
                    return response()->json(['message' => 'GrupoRubrica updated successfully'], 200);
                } else {
                    return response()->json(['message' => 'Error, GrupoRubrica wasn`t updated'], 500);
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
        $grupoRubrica=GrupoRubrica::find($id);
        if ($grupoRubrica!=null) {
            if ($grupoRubrica->delete()) {
                return response()->json(['message'=>'GrupoRubrica '.$id.' deleted'],200);
            } else {
                return response()->json(['message'=>'Error when deleting GrupoRubrica '.$id.'.'],500);
            }
        } else {
            return response()->json(['message'=>'There is no GrupoRubrica '.$id.'.'],500);
        }
    }
}
  
