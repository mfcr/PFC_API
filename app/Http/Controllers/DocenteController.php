<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use App\Models\Ciclo;
use App\Models\Modulo;
use App\Models\CicloModulo;
use App\Models\DocenteTutColectivoCiclo;
use App\Models\DocenteImparteModulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class DocenteController extends Controller
{

    public function altaDocente(Request $request) {

        set_time_limit(60);
        //Si no existe docente con ese id, crear y si existe obtener modificar datos si es necesario y obtener el ID.
        $docente=Docente::firstOrCreate(['email'=>strtolower($request->input('email'))]); 
        if ($request->has('dni') && $request->filled('dni')) {$docente->dni=$request->input('dni');}
        if ($request->has('nombre') && $request->filled('nombre')) {$docente->nombre=$request->input('nombre');}
        if ($request->has('apellido1') && $request->filled('apellido1')) {$docente->apellido1=$request->input('apellido1');}
        if ($request->has('apellido2') && $request->filled('apellido2')) {$docente->apellido2=$request->input('apellido2');}
        if ($request->has('telefono') && $request->filled('telefono')) {$docente->telefono=$request->input('telefono');}
        if ($request->has('activo') && $request->filled('activo')) {$docente->activo=$request->input('activo');}
        if ($request->has('isAdmin') && $request->filled('isAdmin')) {$docente->isAdmin=$request->input('isAdmin');}
        if (!$docente->save()) {            return response()->json(['message' => 'Error modificando al docente con email: '.$docente['email']], 400);        }

        //Si es tutor_colectivo
        if ($request->has('tutorColectivo')) {
            $ciclo=Ciclo::where('codigoCiclo',$request->input('tutorColectivo'))->first();
            $colectivo=DocenteTutColectivoCiclo::firstOrCreate(['ciclo_id'=>$ciclo['id'],'curso'=>$request->input('curso')]);
            $colectivo['docente_id']=$docente['id'];
            if (!$colectivo->save()) { return response()->json(['message'=>'Error al añadir el tutor colectivo al docente con email: '.$docente['email']],400);}
        }
        //Alta docencia ciclos
        for ($i=0;$i<11;$i++) {
            if ($request->has('ciclo'.$i) && $request->has('modulo'.$i)) {
               $ciclo=Ciclo::where('codigoCiclo',$request->input('ciclo'.$i))->first();
               $modulo=Modulo::where('codigoModulo',$request->input('modulo'.$i))->first();
               $ciclo_modulo=CicloModulo::where('ciclo_id',$ciclo['id'])->where('modulo_id',$modulo['id'])->first();
               if ($ciclo_modulo==null) {
                  return response()->json(['message'=>'La combinacion de ciclo '.$ciclo['codigoCiclo'].' y modulo '.$modulo['codigoModulo'].' no existe.'],400);
               }
               $docente_modulo=DocenteImparteModulo::firstOrCreate(['ciclo_modulo_id'=>$ciclo_modulo['id'],'curso'=>$request->input('curso')]);
               $docente_modulo['docente_id']=$docente['id'];
                if (!$docente_modulo->save()) { return response()->json(['message'=>'Error al añadir ciclo_modulo '.$ciclo_modulo['id'].' al docente con email: '.$docente['email']],400);}      
            }
        }
        return response()->json(['message'=>'Docente '.$docente->id.' agregado.'],200);
    }

    public function altaIndividualDocente(Request $request) {

        set_time_limit(60);

        //Si no existe, crear y si existe obtener el ID.
        $docente=Docente::firstOrCreate(['email'=>strtolower($request->input('email'))]);
        $save=false;
        if ($request->has('nombre') && $request->filled('nombre') && $request->input('nombre')!=$docente->nombre) {$docente->nombre=$request->input('nombre'); $save=true;}
        if ($request->has('dni') && $request->filled('dni') && $request->input('dni')!=$docente->dni) {$docente->dni=strtoupper($request->input('dni')); $save=true;}
        if ($request->has('apellido1') && $request->filled('apellido1') && $request->input('apellido1')!=$docente->apellido1) {$docente->apellido1=$request->input('apellido1'); $save=true;}
        if ($request->has('apellido2') && $request->filled('apellido2') && $request->input('apellido2')!=$docente->apellido2) {$docente->apellido2=$request->input('apellido2'); $save=true;}
        if ($request->has('telefono') && $request->filled('telefono') && $request->input('telefono')!=$docente->telefono) {$docente->telefono=$request->input('telefono'); $save=true;}
        if ($request->has('activo') && $request->filled('activo')  && $request->input('activo')!=$docente->activo) { $docente->activo=$request->input('activo'); $save=true;}
        if ($request->has('isAdmin') && $request->filled('isAdmin')  && $request->input('isAdmin')!=$docente->isAdmin) { $docente->isAdmin=$request->input('isAdmin'); $save=true;}
        if ($save) {$docente->save();}
        //Agregar o modificar ciclos_modulos en los que se da la docencia
        for ($i=0;$i<=11;$i++) {
            $ciclo_modulo=$request->input('ciclomodulo_id-docencia-'.$i);
            if ($ciclo_modulo==0) {continue;}
            $docencia=DocenteImparteModulo::firstorCreate(['ciclo_modulo_id'=>$ciclo_modulo,'curso'=>$request->input('curso')]);
            $docencia->docente_id=$docente['id'];
            if (!$docencia->save()) { return response()->json(['message'=>'Error al añadir ciclo_modulo '.$ciclo_modulo.' al docente con email: '.$docente['email']],400);}  
        }
        //Agregar o modificar los ciclos en los que es tutor colectivo.
        for ($i=0;$i<=3;$i++) {
            $ciclo=$request->input('ciclo_id-tutor-'.$i);
            if ($ciclo==0) {continue;}
            $tutoria=DocenteTutColectivoCiclo::firstorCreate(['ciclo_id'=>$ciclo,'curso'=>$request->input('curso')]);
            $tutoria->docente_id=$docente['id'];
            if (!$tutoria->save()) { return response()->json(['message'=>'Error al añadir el tutor colectivo al docente con email: '.$docente['email']],400);}
        }


        return response()->json(['message'=>'Docente '.$request->input('email').' agregado.'],200);
    }

    public function emailSearch(Request $request) {
        $docente=Docente::where('email',strtolower($request->input('email')))->first();
        if ($docente==null) {
            return response()->json(['message'=>'No hay docente con ese email.'],404);
        } else {
            return response($docente,200);
        }
    }


    public function docentes_modulos_tutoriascolectivas_tutindiv_por_docente($docente_id) {
        return response()->json(Docente::where('id',$docente_id)->with('docente_imparte_modulos')->with('docente_imparte_modulos.modulos')->with('docente_imparte_modulos.ciclos')->with('docente_tut_colectivo_ciclos')->with('docente_tut_colectivo_ciclos.ciclos')->with('proyectos')->first(),200);
    }


    public function docentes_modulos_tutoriascolectivas() {
        return response()->json(Docente::with('docente_imparte_modulos')->with('docente_tut_colectivo_ciclos')->orderBy('apellido1')->orderBy('apellido2')->get(),200);
    }

    public function filter2($activo,$value) {  
        $r=Docente::where('activo',$activo)->where(function ($query) use ($value) {
                $query->where('nombre','like','%'.$value.'%')->orWhere('apellido1','like','%'.$value.'%')->orWhere('apellido2','like','%'.$value.'%')
                ->orWhere('email','like','%'.$value.'%')->orWhere('dni','like','%'.$value.'%');})->get();
        if (sizeOf($r)==0) {
            return response()->json(['message'=>'No hay Docentes con activo='.$activo.' y '.$value.' en sus datos'],404);
        } else {
            return response($r,200);
        }
    }

    public function filter($activo) {  
        $r=Docente::where('activo',$activo)->orderBy('apellido1')->orderBy('apellido2')->get();
        if (sizeOf($r)==0) {
            return response()->json(['message'=>'No hay Docentes con activo='.$activo],404);
        } else {
            return response($r,200);
        }
    }


    public function search($value) {
        $r=Docente::where('nombre','like','%'.$value.'%')->orWhere('apellido1','like','%'.$value.'%')->orWhere('apellido2','like','%'.$value.'%')->orWhere('email','like','%'.$value.'%')->orWhere('dni','like','%'.$value.'%')->get();
        if (sizeOf($r)==0) {
            return response()->json(['message'=>'No hay Docentes con cadena '.$value.' en nombre, apellido1, apellido2 o email.'],404);
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
        return response()->json(Docente::orderBy('apellido1')->orderBy('apellido2')->get(),200);
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
            'email'=>'required|email|unique:docentes|max:50',
            'dni'=>'max:9',
            'nombre'=>'max:30',
            'apellido1'=>'max:30',
            'apellido2'=>'max:30',
            'activo'=>'boolean',
            'isAdmin'=>'boolean',
            'telefono'=>'max:15'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'Validation Error']);
        } else {
            //$docente=Docente::create($data); 
            //OTRA OPCION
            $docente=new Docente();
            $docente->email=strtolower($request->input('email'));
            if ($request->has('dni') && $request->filled('dni')) {$docente->dni=$request->input('dni');}
            if ($request->has('nombre') && $request->filled('nombre')) {$docente->nombre=$request->input('nombre');}
            if ($request->has('apellido1') && $request->filled('apellido1')) {$docente->apellido1=$request->input('apellido1');}
            if ($request->has('apellido2') && $request->filled('apellido2')) {$docente->apellido2=$request->input('apellido2');}
            if ($request->has('telefono') && $request->filled('telefono')) {$docente->telefono=$request->input('telefono');}
            if ($request->has('activo') && $request->filled('activo')) {$docente->activo=$request->input('activo');}
            if ($request->has('isAdmin') && $request->filled('isAdmin')) {$docente->isAdmin=$request->input('isAdmin');}

            if ($docente->save()) {
                return response()->json(['message' => 'Docente created successfully','id'=>$docente->id], 201);
            } else {
                return response()->json(['message' => 'Error, Docente wasn`t created'], 500);
            }
        }
    }

    public function showBig($id)
    {
        $docente=Docente::with('ciclos')->with('modulos')->with('proyectos')->with('docente_ciclo_modulos')->with('docente_imparte_modulos')->with('docente_tut_colectivo_ciclos')->with('mensajes')->with('tutor_evalua_proyectos')->where('id',$id)->get();
        if ($docente==null) {
            return response()->json(['message'=>'Docente '.$id.' doesn`t exist'],404);
        } else {
            return response()->json($docente,200);
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
        $docente=Docente::find($id);
        if ($docente==null) {
            return response()->json(['message'=>'Docente '.$id.' doesn`t exist'],404);
        } else {
            return response()->json($docente,200);
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
        $docente=Docente::find($id);
        if ($docente==null) {
            return response()->json(['message'=>'Docente '.$id.' doesn`t exist'],404);
        } else {
            $validator=Validator::make($request->all(),[
                'email'=>'email|unique:docentes|max:50',
                'dni'=>'max:9',
                'nombre'=>'max:30',
                'apellido1'=>'max:30',
                'apellido2'=>'max:30',
                'activo'=>'boolean',
                'isAdmin'=>'boolean',
                'telefono'=>'max:15'
            ]);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors().' Validation Error'],500);
            } else {
                //$docente->update($request->all());
                if ($request->has('email') && $request->filled('email')) {$docente->email=strtolower($request->input('email'));}
                if ($request->has('nombre') && $request->filled('nombre')) {$docente->nombre=$request->input('nombre');}
                if ($request->has('apellido1') && $request->filled('apellido1')) {$docente->apellido1=$request->input('apellido1');}
                if ($request->has('dni') && $request->filled('dni')) {$docente->dni=strtoupper($request->input('dni'));}
                if ($request->has('apellido2') && $request->filled('apellido2')) {$docente->apellido2=$request->input('apellido2');}
                if ($request->has('telefono') && $request->filled('telefono')) {$docente->telefono=$request->input('telefono');}
                if ($request->has('activo') && $request->filled('activo')) {$docente->activo=$request->input('activo');}
                if ($request->has('isAdmin') && $request->filled('isAdmin')) {$docente->isAdmin=$request->input('isAdmin');}

                if ($docente->save()) {
                    return response()->json(['message' => 'Docente updated successfully'], 200);
                } else {
                    return response()->json(['message' => 'Error, Docente wasn`t updated'], 500);
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
        $docente=Docente::find($id);
        if ($docente!=null) {
            if ($docente->delete()) {
                return response()->json(['message'=>'Docente '.$id.' deleted'],200);
            } else {
                return response()->json(['message'=>'Error when deleting Docente '.$id.'.'],500);
            }
        } else {
            return response()->json(['message'=>'There is no Docente '.$id.'.'],500);
        }
    }
}
