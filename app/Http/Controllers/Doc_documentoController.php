<?php

namespace App\Http\Controllers;
use App\Models\Proceso;
use App\Models\Doc_documento;
use App\Models\Tip_tipo_doc;


use Illuminate\Http\Request;
 

class Doc_documentoController extends Controller
{

   public $busqueda = '';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $busqueda = $request->busqueda;
        // se pasa toda la informacion de db 
        $datos['doc_documentos']= Doc_documento::where('doc_nombre',  'like', '%' . $busqueda . '%')
        ->orwhere('doc_codigo','like', '%' . $busqueda . '%')
        ->orwhere('created_at','like', '%' . $busqueda . '%')
            ->paginate(10);
       
        $proceso['doc_documentos']=Doc_documento::paginate(10);
        $tip_tipo_doc['tip_tipo_docs']=Tip_tipo_doc::paginate(10);
 
         return view('doc_documentos.index',$datos,$proceso,$tip_tipo_doc); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {  
        
        
       
        $busqueda = $request->busqueda;
            $Doc_documento['doc_documentos']= Doc_documento::where('doc_nombre',  'like', '%' . $busqueda . '%')
            ->orwhere('doc_codigo','like', '%' . $busqueda . '%')
             ->paginate(1);
             

        $proceso['procesos']=Proceso::paginate(10);
        $tip_tipo_doc['tip_tipo_docs']=Tip_tipo_doc::paginate(10);
        return view('doc_documentos.create',$proceso,$tip_tipo_doc);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  

     public function store(Request $request)
     { // del formulario se envian todos los datos al metodo store
         // aca responde si realmente la informacion esta llegando  
         // se valida para validar que las llaves foraneas no existan en los documentos creados 
         //los  datos del documento van aser igual a todos los datos que envien
         $proceso_id   = $request->input('proceso_id');
         $tip_tipo_doc_id   = $request->input('tip_tipo_doc_id');

         
         if (Doc_documento::where('proceso_id', $proceso_id)->exists()) {
            // El proceso ya está asociado a un documento , redirigir  a index
            return redirect()->route('doc_documentos.index')->with('mensaje', 'Este proceso proceso_id  ya ha sido asociado con un documento.');
        }  if (Doc_documento::where('tip_tipo_doc_id', $tip_tipo_doc_id)->exists()) {
         
            return redirect()->route('doc_documentos.index')->with('mensaje', 'Este proceso tip_tipo_doc_id ya ha sido asociado con un documento.');
        }

        

        
         $datos = request()->except(['_token']);
         // se recolectan todos los datos del formulario y se   quita la llave del token 
         // se optiene  el modelo Doc_documento  y se inserta toda la informacion en la base de datos  
         Doc_documento::insert($datos);
         return redirect('doc_documentos')->with('mensaje','Doc_documentos registrado con exito');
     }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doc_documento  $Doc_documento
     * @return \Illuminate\Http\Response
     */
    public function show(Doc_documento $doc_documentos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doc_documento  $Doc_documento
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            
        $proceso['procesos']=Proceso::paginate(10);

         $tip_tipo_doc['tip_tipo_docs']=Proceso::paginate(10);
        // se busca un registro por id  que viene atravez de la url 
        $item=Doc_documento::findOrfail($id);
//aca se incluyen los datos por id  retornando la vista  
        return view('doc_documentos.edit' ,compact('item'),$proceso,$tip_tipo_doc);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doc_documento  $Doc_documento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        // aca se recibe la informacion del formulario para que se actualice
        // y se le quita el metodo PATCH 
        $datos = request()->except(['_token','_method']);
     
        $proceso['procesos']=Proceso::paginate(10);
        $tip_tipo_doc['$tip_tipo_docs']=Tip_tipo_doc::paginate(10);

        // empleado si coincide el id  hace update 
        Doc_documento::where('id','=',$id)->update($datos);
        $item=Doc_documento::findOrfail($id);
        return view('doc_documentos.edit',compact('item'),$proceso,$tip_tipo_doc);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doc_documento  $Doc_documento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        {
            
            $item=Doc_documento::findOrfail($id);
            Doc_documento::destroy($id);
            return redirect('doc_documentos')->with('mensaje','Borrado con exito');;
        }
    }
}
