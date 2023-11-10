<?php

namespace App\Http\Controllers;
use App\Models\Proceso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class ProcesoController extends Controller
{
    public $search = '';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $busqueda = $request->busqueda;
        $datos['procesos']= Proceso::where('pro_prefijo',  'like', '%' . $busqueda . '%')
        ->orwhere('pro_nombre','like', '%' . $busqueda . '%')
        ->orwhere('created_at','like', '%' . $busqueda . '%')
            ->paginate(10);
          
       
            
         return view('proceso.index',$datos);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
  
        $proceso['procesos']=Proceso::paginate(10);
        return view('proceso.create',$proceso);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {$datosProceso = request()->except(['_token']);
        
        Proceso::insert($datosProceso);
        return redirect('proceso')->with('mensaje','proceso registrada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proceso  $proceso
     * @return \Illuminate\Http\Response
     */
    public function show(Proceso $proceso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proceso  $proceso
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $procesos['proceso']=Proceso::paginate(10);
        $item=Proceso::findOrfail($id);

        return view('proceso.edit' ,compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proceso  $proceso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $datosProceso = request()->except(['_token','_method']);
        Proceso::where('id','=',$id)->update($datosProceso);
        $item=Proceso::findOrfail($id);
        return view('proceso.edit',compact('item'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proceso  $proceso
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item=Proceso::findOrfail($id);
       
        return redirect('proceso')->with('mensaje','Borrado con exito');;
    }
}
