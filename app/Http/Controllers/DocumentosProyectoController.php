<?php

namespace App\Http\Controllers;

use App\Models\DocumentosProyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DocumentosProyectoController extends Controller
{

    public function search($value) {
        $r=DocumentosProyecto::where('descripcion','like','%'.$value.'%')->orWhere('tipoDocumento','like','%'.$value.'%')->get();
        if (sizeOf($r)==0) {
            return response()->json(['message'=>'No hay Documentos con la cadena '.$value.' en tipo o descripcion.'],404);
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
        return response()->json(DocumentosProyecto::orderBy('id')->get(),200);
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
            'UriDocumento'=>'max:200',
            'isFile'=>'required|boolean',
            'publico'=>'required|boolean'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'Validation Error']);
        } else {

            //$documentosProyecto=DocumentosProyecto::create($data); 
            //OTRA OPCION
            $documentosProyecto=new DocumentosProyecto();
            $documentosProyecto->proyecto_id=$request->input('proyecto_id');
            $documentosProyecto->tipoDocumento=$request->input('tipoDocumento');
            $documentosProyecto->isFile=$request->input('isFile');
            if ($request->has('descripcion') && $request->filled('descripcion')) {$documentosProyecto->descripcion=$request->input('descripcion');}
            if ($request->has('publico') && $request->filled('publico')) {$documentosProyecto->publico=$request->input('publico');}
            if ($documentosProyecto->isFile==true) {
                if(!$request->hasFile('fichero')) { return response()->json(['message'=>'upload_file_not_found'], 400);   }
                $file = $request->file('fichero');
                if(!$file->isValid()) { return response()->json(['message'=>'invalid_file_upload'], 400);  }
                $path = '/uploads/files/docProyectos/'.$documentosProyecto->proyecto_id.'/';
                $fileName=str_replace(' ', '_', $file->getClientOriginalName()); //Quitamos espacios en el nombre y los cambiamos por _.
                $file->move(public_path().$path, $fileName);
                //$documentosProyecto->UriDocumento=url($path.$fileName);
                $documentosProyecto->UriDocumento=$path.$fileName;
            } else { //En lugar de insertar un fichero, ha insertado un link.
                if ($request->has('UriDocumento') && $request->filled('UriDocumento')) {$documentosProyecto->UriDocumento=$request->input('UriDocumento');}    
            }

            if ($documentosProyecto->save()) {
                return response()->json(['message' => 'DocumentosProyecto created successfully','id'=>$documentosProyecto->id], 201);
            } else {
                return response()->json(['message' => 'Error, DocumentosProyecto wasn`t created'], 500);
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
        $documentosProyecto=DocumentosProyecto::find($id);
        if ($documentosProyecto==null) {
            return response()->json(['message'=>'DocumentosProyecto '.$id.' doesn`t exist'],404);
        } else {
            return response()->json($documentosProyecto,200);
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
        $documentosProyecto=DocumentosProyecto::find($id);
        if ($documentosProyecto==null) {
            return response()->json(['message'=>'DocumentosProyecto '.$id.' doesn`t exist'],404);
        } else {
            $validator=Validator::make($request->all(),[
                'proyecto_id'=>'numeric',
                'UriDocumento'=>'max:200',
                'isFile'=>'boolean',
                'publico'=>'boolean'
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors().' Validation Error'],500);
            } else {
                //$documentosProyecto->update($request->all());
                if ($request->has('proyecto_id') && $request->filled('proyecto_id')) {$documentosProyecto->proyecto_id=$request->input('proyecto_id');}
                if ($request->has('tipoDocumento') && $request->filled('tipoDocumento')) {$documentosProyecto->tipoDocumento=$request->input('tipoDocumento');}
                if ($request->has('descripcion') && $request->filled('descripcion')) {$documentosProyecto->descripcion=$request->input('descripcion');}
                if ($request->has('publico') && $request->filled('publico')) {$documentosProyecto->publico=$request->input('publico');}
                $wasFile=$documentosProyecto->isFile;
                if ($request->has('isFile') && $request->filled('isFile')) {$documentosProyecto->isFile=$request->input('isFile');}
                if ($request->has('isFile')) {
                    $isFile=$documentosProyecto->isFile;
                    if ($isFile==true) {
                        //Hay fichero adjunto
                        if(!$request->hasFile('fichero')) { return response()->json(['message'=>'upload_file_not_found'], 400); }
                        $file = $request->file('fichero');
                        if(!$file->isValid()) { return response()->json(['message'=>'invalid_file_upload'], 400); }
                        if ($wasFile==true) { //Eliminamos fichero guardado.
                            $uriDisk= public_path().str_replace('/','\\',parse_url($documentosProyecto->UriDocumento,PHP_URL_PATH)); //Construimos el path desde la ruta uri guardada.
                            if (\File::exists($uriDisk)) { \File::delete($uriDisk);}
                        } 
                        //Guardamos el nuevo
                        $path = '/uploads/files/docProyectos/'.$documentosProyecto->proyecto_id.'/';
                        $fileName=str_replace(' ', '_', $file->getClientOriginalName()); //Quitamos espacios en el nombre y los cambiamos por _.
                        $file->move(public_path().$path, $fileName);
                        //$documentosProyecto->UriDocumento=url($path.$fileName);
                        $documentosProyecto->UriDocumento=$path.$fileName;
                    } else {
                        if ($wasFile==true) { //Eliminamos fichero y reseteamos uri
                            $uriDisk= public_path().str_replace('/','\\',parse_url($documentosProyecto->UriDocumento,PHP_URL_PATH)); //Construimos el path desde la ruta uri guardada.
                            if (\File::exists($uriDisk)) { \File::delete($uriDisk);}
                            $documentosProyecto->UriDocumento=null;
                        }
                        if ($request->has('UriDocumento') && $request->filled('UriDocumento')) {$documentosProyecto->UriDocumento=$request->input('UriDocumento');}    
                    }
                }


                if ($documentosProyecto->save()) {
                    return response()->json(['message' => 'DocumentosProyecto updated successfully'], 200);
                } else {
                    return response()->json(['message' => 'Error, DocumentosProyecto wasn`t updated'], 500);
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
        $documentosProyecto=DocumentosProyecto::find($id);
        if ($documentosProyecto!=null) {
            $uriDisk=null;
            if ($documentosProyecto->isFile==true) {
                $uriDisk= public_path().str_replace('/','\\',parse_url($documentosProyecto->UriDocumento,PHP_URL_PATH)); //Construimos el path desde la ruta uri guardada.
            }
            if ($documentosProyecto->delete()) {
                if ($uriDisk!= null && \File::exists($uriDisk)) {  \File::delete($uriDisk);} //Eliminamos fichero del disco
                return response()->json(['message'=>'DocumentosProyecto '.$id.' deleted'],200);
            } else {
                return response()->json(['message'=>'Error when deleting DocumentosProyecto '.$id.'.'],500);
            }
        } else {
            return response()->json(['message'=>'There is no DocumentosProyecto '.$id.'.'],500);
        }
    }
}
   


