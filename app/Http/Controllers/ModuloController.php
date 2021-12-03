<?php

namespace App\Http\Controllers;

use App\Models\Modulo;
use App\Models\CicloModulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ModuloController extends Controller
{
    public function filter2($ciclo,$value) {
        if ($ciclo!=0) {
            $mods=CicloModulo::where('ciclo_id' ,$ciclo)->pluck('modulo_id')->toArray();
            $r=Modulo::whereIn('id',$mods)->where(function ($query) use ($value) {
                $query->where('codigoModulo','like','%'.$value.'%')->orWhere('nombreModulo','like','%'.$value.'%');})->get();
            if (sizeOf($r)==0) {
                return response()->json(['message'=>'No hay Modulos del ciclo '.$ciclo.' con '.$value.' en nombre o codigo.'],404);
            } else {
                return response($r,200);
            }

        } else {
            return $this->search($value);
        }

    }

    public function filter($ciclo) {
        if ($ciclo!=0) {
            $mods=CicloModulo::where('ciclo_id' ,$ciclo)->pluck('modulo_id')->toArray();
            $r=Modulo::whereIn('id',$mods)->get();
            if (sizeOf($r)==0) {
                return response()->json(['message'=>'No hay Modulos del ciclo '.$ciclo],404);
            } else {
                return response($r,200);
            }


        } else {
            return $this->index();
        }
    }

    public function search($value) {
        $r=Modulo::where('codigoModulo','like','%'.$value.'%')->orWhere('nombreModulo','like','%'.$value.'%')->get();
        if (sizeOf($r)==0) {
            return response()->json(['message'=>'No hay Modulos con la cadena '.$value.' en código o nombre.'],404);
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
        return response()->json(Modulo::orderBy('id')->get(),200);
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
            'codigoModulo'=>'required|unique:modulos|max:10',
            'nombreModulo'=>'required|max:200',
            'tiene_UC'=>'boolean',
            'curso'=>'required|numeric'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'Validation Error']);
        } else {
            //$modulo=Modulo::create($data); 
            //OTRA OPCION
            $modulo=new Modulo();
            $modulo->codigoModulo=$request->input('codigoModulo');
            $modulo->nombreModulo=$request->input('nombreModulo');
            $modulo->curso=$request->input('curso');
            if ($request->has('tiene_UC') && $request->filled('tiene_UC')) {$modulo->tiene_UC=$request->input('tiene_UC');}

            if ($modulo->save()) {
                return response()->json(['message' => 'Modulo created successfully','id'=>$modulo->id], 201);
            } else {
                return response()->json(['message' => 'Error, Modulo wasn`t created'], 500);
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
        $modulo=Modulo::find($id);
        if ($modulo==null) {
            return response()->json(['message'=>'Modulo '.$id.' doesn`t exist'],404);
        } else {
            return response()->json($modulo,200);
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
        $modulo=Modulo::find($id);
        if ($modulo==null) {
            return response()->json(['message'=>'Modulo '.$id.' doesn`t exist'],404);
        } else {
            $validator=Validator::make($request->all(),[
                'codigoModulo'=>'max:10',
                'nombreModulo'=>'max:200',
                'tiene_UC'=>'boolean',
                'curso'=>'numeric'
            ]);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors().' Validation Error'],500);
            } else {
                //$modulo->update($request->all());
                if ($request->has('codigoModulo') && $request->filled('codigoModulo')) {$modulo->codigoModulo=$request->input('codigoModulo');}
                if ($request->has('nombreModulo') && $request->filled('nombreModulo')) {$modulo->nombreModulo=$request->input('nombreModulo');}
                if ($request->has('curso') && $request->filled('curso')) {$modulo->curso=$request->input('curso');}
                if ($request->has('tiene_UC') && $request->filled('tiene_UC')) {$modulo->tiene_UC=$request->input('tiene_UC');}

                if ($modulo->save()) {
                    return response()->json(['message' => 'Modulo updated successfully'], 200);
                } else {
                    return response()->json(['message' => 'Error, Modulo wasn`t updated'], 500);
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
        $modulo=Modulo::find($id);
        if ($modulo!=null) {
            if ($modulo->delete()) {
                return response()->json(['message'=>'Modulo '.$id.' deleted'],200);
            } else {
                return response()->json(['message'=>'Error when deleting Modulo '.$id.'.'],500);
            }
        } else {
            return response()->json(['message'=>'There is no Modulo '.$id.'.'],500);
        }
    }
}
      
