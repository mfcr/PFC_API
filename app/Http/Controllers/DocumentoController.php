<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DocumentoController extends Controller
{

    public function filter($user,$ciclo) {  
        if ($ciclo=="0") {$ciclo=null;}
        $r=Documento::where('ciclo_id',$ciclo);
        if ($user==0) { //Not logged
            $r=$r->where('publico',true)->get();
        } else { //Logged
            $r=$r->get();                
        }

        if (sizeOf($r)==0) {
            return response()->json(['message'=>'No hay Documentos del ciclo '.$ciclo],404);
        } else {
            return response($r,200);
        }
    }

    public function filter2($ciclo,$value) { 
        if ($ciclo=="0") {$ciclo=null;}
        $r=Documento::where('ciclo_id',$ciclo)->where(function ($query) use ($value) {
            $query->where('nombre','like','%'.$value.'%')->orWhere('descripcion','like','%'.$value.'%')->orWhere('tipo','like','%'.$value.'%');})->get();

        if (sizeOf($r)==0) {
            return response()->json(['message'=>'No hay Documentos del ciclo '.$ciclo.' con '.$value.' en nombre, descripcion o tipo.'],404);
        } else {
            return response($r,200);
        }
    }


    public function search($value) {
        $r=Documento::where('nombre','like','%'.$value.'%')->orWhere('descripcion','like','%'.$value.'%')->orWhere('tipo','like','%'.$value.'%')->get();
        if (sizeOf($r)==0) {
            return response()->json(['message'=>'No hay Documentos con la cadena '.$value.' en nombre, tipo o descripcion.'],404);
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
        return response()->json(Documento::orderBy('id')->get(),200);
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
            'ciclo_id'=>'required|numeric',
            'nombre'=>'required|max:100',
            'tipo'=>'required',
            'isFile'=>'required|boolean',
            'publico'=>'required|boolean',
            'uri'=>'max:200'
        ]);
        //DESCRIPCION ES LONGTEXT Y NO REQUIRED

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'Validation Error']);
        } else {
            //$documento=Documento::create($data); 
            //OTRA OPCION
            $documento=new Documento();
            if ($request->input('ciclo_id')!=0) {
                $documento->ciclo_id=$request->input('ciclo_id');
            } else {
                $documento->ciclo_id=null;
            }
            $documento->nombre=$request->input('nombre');
            $documento->tipo=$request->input('tipo');
            $documento->isFile=$request->input('isFile');
            $documento->publico=$request->input('publico');
            if ($request->has('descripcion') && $request->filled('descripcion')) {$documento->descripcion=$request->input('descripcion');}

            if ($documento->isFile==true) {
                if(!$request->hasFile('fichero')) { return response()->json(['message'=>'upload_file_not_found'], 400);   }

                $file = $request->file('fichero');
                if(!$file->isValid()) { return response()->json(['message'=>'invalid_file_upload'], 400);  }
                $destino=0;
                if ($documento->ciclo_id!=null) {$destino=$documento->ciclo_id;}
                $path = '/uploads/files/documentos/'.$destino.'/';
                $fileName=str_replace(' ', '_', $file->getClientOriginalName()); //Quitamos espacios en el nombre y los cambiamos por _.
                $file->move(public_path().$path, $fileName);
                //$documento->uri=url($path.$fileName);
                $documento->uri=$path.$fileName;
            } else { //En lugar de insertar un fichero, ha insertado un link.
                if ($request->has('uri') && $request->filled('uri')) {$documento->uri=$request->input('uri');}    
            }
            if ($documento->save()) {
                return response()->json(['message' => 'Documento created successfully','id'=>$documento->id], 201);
            } else {
                return response()->json(['message' => 'Error, Documento wasn`t created'], 500);
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
        $documento=Documento::find($id);
        if ($documento==null) {
            return response()->json(['message'=>'Documento '.$id.' doesn`t exist'],404);
        } else {
            return response()->json($documento,200);
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
        $documento=Documento::find($id);
        if ($documento==null) {
            return response()->json(['message'=>'Documento '.$id.' doesn`t exist'],404);
        } else {
            $validator=Validator::make($request->all(),[
                'ciclo_id'=>'numeric',
                'nombre'=>'max:100',
                'isFile'=>'boolean',
                'publico'=>'boolean',
                'uri'=>'max:200'
            ]);
            //DESCRIPCION ES LONGTEXT Y NO REQUIRED

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors().' Validation Error'],500);
            } else {
                //$documento->update($request->all());
                if ($request->has('ciclo_id') && $request->filled('ciclo_id')) { //Si se envia 0 como valor
                   if ($request->input('ciclo_id')!=0) {$documento->ciclo_id=$request->input('ciclo_id');} else {$documento->ciclo_id=null;}
                }
                if ($request->has('nombre') && $request->filled('nombre')) {$documento->nombre=$request->input('nombre');}
                if ($request->has('tipo') && $request->filled('tipo')) {$documento->tipo=$request->input('tipo');}
                if ($request->has('descripcion') && $request->filled('descripcion')) {$documento->descripcion=$request->input('descripcion');}
                $wasFile=$documento->isFile;
                if ($request->has('isFile') && $request->filled('isFile')) {$documento->isFile=$request->input('isFile');}
                if ($request->has('publico') && $request->filled('publico')) {$documento->publico=$request->input('publico');}

                $isFile=$documento->isFile;
                if ($isFile==true) {
                    //Hay fichero adjunto
                    if(!$request->hasFile('fichero')) { return response()->json(['message'=>'upload_file_not_found'], 400); }
                    $file = $request->file('fichero');
                    if(!$file->isValid()) { return response()->json(['message'=>'invalid_file_upload'], 400); }
                    if ($wasFile==true) { //Eliminamos fichero guardado.
                        $uriDisk= public_path().str_replace('/','\\',parse_url($documento->uri,PHP_URL_PATH)); //Construimos el path desde la ruta uri guardada.
                        if (\File::exists($uriDisk)) { \File::delete($uriDisk);}
                    } 
                    //Guardamos el nuevo
                    $destino=0;
                    if ($documento->ciclo_id!=null) {$destino=$documento->ciclo_id;}
                    $path = '/uploads/files/documentos/'.$destino.'/';
                    $fileName=str_replace(' ', '_', $file->getClientOriginalName()); //Quitamos espacios en el nombre y los cambiamos por _.
                    $file->move(public_path().$path, $fileName);
                    //$documento->uri=url($path.$fileName);
                    $documento->uri=$path.$fileName;
                } else {
                    if ($wasFile==true) { //Eliminamos fichero y reseteamos uri
                        $uriDisk= public_path().str_replace('/','\\',parse_url($documento->uri,PHP_URL_PATH)); //Construimos el path desde la ruta uri guardada.
                        if (\File::exists($uriDisk)) { \File::delete($uriDisk);}
                        $documento->uri=null;
                    }
                    if ($request->has('uri') && $request->filled('uri')) {$documento->uri=$request->input('uri');}    
                }

                if ($documento->save()) {
                    return response()->json(['message' => 'Documento updated successfully'], 200);
                } else {
                    return response()->json(['message' => 'Error, Documento wasn`t updated'], 500);
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
        $documento=Documento::find($id);
        if ($documento!=null) {
            $uriDisk=null;
            if ($documento->isFile==true) {
                $uriDisk= public_path().str_replace('/','\\',parse_url($documento->uri,PHP_URL_PATH)); //Construimos el path desde la ruta uri guardada.
            }
            if ($documento->delete()) {
                if ($uriDisk!= null && \File::exists($uriDisk)) {  \File::delete($uriDisk);} //Eliminamos fichero del disco
                return response()->json(['message'=>'Documento '.$id.' deleted'],200);
            } else {
                return response()->json(['message'=>'Error when deleting Documento '.$id.'.'],500);
            }
        } else {
            return response()->json(['message'=>'There is no Documento '.$id.'.'],500);
        }
    }
}
  
