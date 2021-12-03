<?php

namespace App\Http\Controllers;


use App\Models\Alumno;
use App\Models\CicloModulo;
use App\Models\ModulosMatriculado;
use App\Models\Proyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class AlumnoController extends Controller
{


    public function altaAlumno(Request $request) {

        set_time_limit(60);
        $email=strtolower($request->input('email'));
        $ciclo=$request->input('ciclo');
        $curso=$request->input('curso');

        //Si no existe, crear y si existe obtener el ID.
        $alumno=Alumno::firstOrCreate(['email'=>$email]);

        //Alta proyecto para ese curso y ciclo. Primero comprobar si ya existe proyecto para ese alumno curso y ciclo. (unique).
        $proyecto=Proyecto::firstOrCreate(['ciclo_id'=>$ciclo,'curso'=>$curso,'alumno_id'=>$alumno->id,'estado'=>0]);

        $ciclosModulos=CicloModulo::where('ciclo_id',$ciclo)->get();
        foreach ($ciclosModulos as $mod) {
            $matricula=ModulosMatriculado::firstOrCreate(['ciclo_modulo_id'=>$mod->id, 'proyecto_id'=>$proyecto->id]);
        }
        return response()->json(['message'=>'Alumno '.$email.' agregado.'],200);
    }

    public function emailSearch(Request $request) {
        $alumno=Alumno::where('email',strtolower($request->input('email')))->first();
        if ($alumno==null) {
            return response()->json(['message'=>'No hay Alumnos con ese email.'],404);
        } else {
            return response($alumno,200);
        }
    }

    public function altaIndividualAlumno(Request $request) {

        set_time_limit(60);

        //Si no existe, crear y si existe obtener el ID.
        $alumno=Alumno::firstOrCreate(['email'=>strtolower($request->input('email'))]);
        $save=false;
        if ($request->has('nombre') && $request->filled('nombre') && $request->input('nombre')!=$alumno->nombre) {$alumno->nombre=$request->input('nombre'); $save=true;}
        if ($request->has('dni') && $request->filled('dni') && $request->input('dni')!=$alumno->dni) {$alumno->dni=strtoupper($request->input('dni')); $save=true;}
        if ($request->has('apellido1') && $request->filled('apellido1') && $request->input('apellido1')!=$alumno->apellido1) {$alumno->apellido1=$request->input('apellido1'); $save=true;}
        if ($request->has('apellido2') && $request->filled('apellido2') && $request->input('apellido2')!=$alumno->apellido2) {$alumno->apellido2=$request->input('apellido2'); $save=true;}
        if ($request->has('telefono') && $request->filled('telefono') && $request->input('telefono')!=$alumno->telefono) {$alumno->telefono=$request->input('telefono'); $save=true;}
        if ($request->has('activo') && $request->filled('activo')  && $request->input('activo')!=$alumno->activo) { $alumno->activo=$request->input('activo'); $save=true;}
        if ($save) {$alumno->save();}

        for ($i=0;$i<=5;$i++) {
            $ciclo=$request->input('ciclo_id-matricula-'.$i);
            if ($ciclo==0) {continue;}
            //Alta proyecto para ese curso y ciclo. Primero comprobar si ya existe proyecto para ese alumno curso y ciclo. (unique).
            $proyecto=Proyecto::firstOrCreate(['ciclo_id'=>$ciclo,'curso'=>$request->input('curso'),'alumno_id'=>$alumno->id]);

            $ciclosModulos=CicloModulo::where('ciclo_id',$ciclo)->get();
            foreach ($ciclosModulos as $mod) {
                $matricula=ModulosMatriculado::firstOrCreate(['ciclo_modulo_id'=>$mod->id, 'proyecto_id'=>$proyecto->id]);
            }


        }
        return response()->json(['message'=>'Alumno '.$request->input('email').' agregado.'],200);
    }




    public function borraAlumno($id) {

        $proyecto=Proyecto::where('alumno_id',$id)->get();
        if ($proyecto!=null) {
            foreach ($proyecto as $pro) {
                $matriculas=ModulosMatriculado::where('proyecto_id',$pro->id)->delete();
                if (!$matriculas) {return response()->json(['message'=>'Error borrando matriculas.'],400);}
            }
            $proyecto=Proyecto::where('alumno_id',$id)->delete();
            if (!$proyecto) {return response()->json(['message'=>'Error borrando proyectos.'],400);}
        }
        $alumno=Alumno::where('id',$id)->delete();
        if (!$alumno) {return response()->json(['message'=>'Error borrando alumno.'],400);}


        return response()->json(['message'=>'Alumno eliminado.'],200);
    }


    public function conProyectos() {
        $r=Alumno::with('proyectos')->with('proyectos.ciclos')->with('proyectos.estados')->get();
        if (sizeOf($r)==0) {
            return response()->json(['message'=>'No hay Alumnos registrados.'],404);
        } else {
            return response($r,200);
        }
    }



    public function search($value) {
        $r=Alumno::where('nombre','like','%'.$value.'%')->orWhere('apellido1','like','%'.$value.'%')->orWhere('apellido2','like','%'.$value.'%')->orWhere('email','like','%'.$value.'%')
            ->orWhere('dni','like','%'.$value.'%')->get();
        if (sizeOf($r)==0) {
            return response()->json(['message'=>'No hay Alumnos con cadena '.$value.' en nombre, apellido1, apellido2, email o dni.'],404);
        } else {
            return response($r,200);
        }
    }

    public function filter($activo) {  
        $r=Alumno::where('activo',$activo)->get();
        if (sizeOf($r)==0) {
            return response()->json(['message'=>'No hay Alumnos con activo='.$activo],404);
        } else {
            return response($r,200);
        }
    }

    public function filter2($activo,$value) {
        $r=Alumno::where('activo',$activo)->where(function ($query) use ($value) {
                $query->where('nombre','like','%'.$value.'%')->orWhere('apellido1','like','%'.$value.'%')->orWhere('apellido2','like','%'.$value.'%')
                ->orWhere('email','like','%'.$value.'%')->orWhere('dni','like','%'.$value.'%');})->get();
        if (sizeOf($r)==0) {
            return response()->json(['message'=>'No hay Alumnos con cadena '.$value.' en nombre, apellido1, apellido2, email o dni.'],404);
        } else {
            return response($r,200);
        }
    }


    public function filterWithProject($activo) {  
        $r=Alumno::with(proyectos)->where('activo','=',$activo)->get();
        if (sizeOf($r)==0) {
            return response()->json(['message'=>'No hay Alumnos con activo='.$activo],404);
        } else {
            return response($r,200);
        }
    }

//----------  CRUD FUNCTIONS ------//
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Alumno::orderBy('id')->get(),200);
    }


    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'email'=>'email|required|unique:alumnos|max:50',
            'nombre'=>'max:30',
            'dni'=>'max:9',
            'apellido1'=>'max:30',
            'apellido2'=>'max:30',
            'telefono'=>'max:15',
            'activo'=>'boolean',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'Validation Error']);
        } else {
            //$alumno=Alumno::create($data); 
            //OTRA OPCION
            $alumno=new Alumno();
            $alumno->email=strtolower($request->input('email'));
            if ($request->has('dni') && $request->filled('dni')) {$alumno->dni=$request->input('dni');}
            if ($request->has('nombre') && $request->filled('nombre')) {$alumno->nombre=$request->input('nombre');}
            if ($request->has('apellido1') && $request->filled('apellido1')) {$alumno->apellido1=$request->input('apellido1');}
            if ($request->has('apellido2') && $request->filled('apellido2')) {$alumno->apellido2=$request->input('apellido2');}
            if ($request->has('telefono') && $request->filled('telefono')) {$alumno->telefono=$request->input('telefono');}
            if ($request->has('activo') && $request->filled('activo')) {$alumno->activo=$request->input('activo');}

            if ($alumno->save()) {
                return response()->json(['message' => 'Alumno created successfully','id'=>$alumno->id], 201);
            } else {
                return response()->json(['message' => 'Error, Alumno wasn`t created'], 500);
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
        $alumno=Alumno::find($id);
        if ($alumno==null) {
            return response()->json(['message'=>'Alumno '.$id.' doesn`t exist'],404);
        } else {
            return response()->json($alumno,200);
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

        $alumno=Alumno::find($id);
        if ($alumno==null) {
            return response()->json(['message'=>'Alumno '.$id.' doesn`t exist'],404);
        } else {
            $validator=Validator::make($request->all(),[
                'email'=>'email|unique:alumnos|max:50',
                'nombre'=>'max:30',
                'dni'=>'max:9',
                'apellido1'=>'max:30',
                'apellido2'=>'max:30',
                'telefono'=>'max:15',
	            'activo'=>'boolean',
            ]);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors().' Validation Error'],500);
            } else {
                //$alumno->update($request->all());
                if ($request->has('email') && $request->filled('email') && $request->input('email')!=$alumno->email) {$alumno->email=strtolower($request->input('email'));}
                if ($request->has('nombre') && $request->filled('nombre') && $request->input('nombre')!=$alumno->nombre) {$alumno->nombre=$request->input('nombre');}
                if ($request->has('dni') && $request->filled('dni') && $request->input('dni')!=$alumno->dni) {$alumno->dni=strtoupper($request->input('dni'));}
                if ($request->has('apellido1') && $request->filled('apellido1') && $request->input('apellido1')!=$alumno->apellido1) {$alumno->apellido1=$request->input('apellido1');}
                if ($request->has('apellido2') && $request->filled('apellido2') && $request->input('apellido2')!=$alumno->apellido2) {$alumno->apellido2=$request->input('apellido2');}
                if ($request->has('telefono') && $request->filled('telefono') && $request->input('telefono')!=$alumno->telefono) {$alumno->telefono=$request->input('telefono');}
                if ($request->has('activo') && $request->filled('activo')  && $request->input('activo')!=$alumno->activo) { $alumno->activo=$request->input('activo');}

                if ($alumno->save()) {
                    return response()->json(['message' => 'Alumno updated successfully'], 200);
                } else {
                    return response()->json(['message' => 'Error, Alumno wasn`t updated'], 500);
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
        $alumno=Alumno::find($id);
        if ($alumno!=null) {
            if ($alumno->delete()) {
                return response()->json(['message'=>'Alumno '.$id.' deleted'],200);
            } else {
                return response()->json(['message'=>'Error when deleting Alumno '.$id.'.'],500);
            }
        } else {
            return response()->json(['message'=>'There is no Alumno '.$id.'.'],500);
        }
    }

}
