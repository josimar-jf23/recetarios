<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Receta;
use App\Models\RecetaTipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class RecetasController extends Controller
{
    public function index()
    {
        $user_id=Auth::id();
        $recetas=Receta::with('receta_tipo')
                            ->with('image')
                            ->where('user_id',$user_id)
                            ->orderBy('receta_tipo_id','asc')
                            ->orderBy('nombre', 'asc')
                            ->paginate(10);
        return view('admin.recetas.index',compact('recetas'));
    }

    public function create()
    {
        $receta_tipos=RecetaTipo::all();
        return view('admin.recetas.create',compact('receta_tipos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>'required',
            'estado'=>'required',
            'receta_tipo_id'=>'required',
            'imagen'=>'image|max:2048'
        ]);
        $t_fecha=date("Y-m-d H:i:s");
        $user_id=Auth::id();
        $receta=Receta::create([
            'nombre'            => $request->nombre,
            'slug'              => Str::slug($request->nombre."-".$t_fecha),
            'descripcion'       => $request->descripcion,
            'indicaciones'      => $request->indicaciones,
            'estado'            => $request->estado,
            'fecha'             => $t_fecha,
            'receta_tipo_id'    => $request->receta_tipo_id,
            'user_id'           => $user_id
        ]);
        if($request->file('imagen')){
            $file=$request->file('imagen');
            $filename=$file->getClientOriginalName();       
            $url= $file->storeAs(('public/imagenes/recetas/'.$receta->id),$filename);

            $receta->image()->create([
                'url'=>$url
            ]);                        
        }
        return redirect()->route('admin.recetas.index')->with('toast_success','Se creo correctamente!!!');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Receta $receta)
    {
        $this->authorize('creator',$receta);
        $receta_tipos=RecetaTipo::all();
        return view('admin.recetas.edit',compact('receta','receta_tipos'));
    }

    public function update(Request $request, Receta $receta)
    {
        $request->validate([
            'nombre'=>'required',
            'estado'=>'required',
            'receta_tipo_id'=>'required',
            'imagen'=>'image|max:2048'
        ]);
        $t_fecha=$receta->fecha;
        $receta->update([
            'nombre'        => $request->nombre,
            'slug'          => Str::slug($request->nombre."-".$t_fecha),
            'descripcion'   => $request->descripcion,
            'indicaciones'  => $request->indicaciones,
            'estado'        => $request->estado,
            'receta_tipo_id'  => $request->receta_tipo_id,
        ]);
        if($request->file('imagen')){
            $file=$request->file('imagen');
            $filename=$file->getClientOriginalName();       
            $url= $file->storeAs(('public/imagenes/recetas/'.$receta->id),$filename);

            if($receta->image){
                Storage::delete($receta->image->url);
                $receta->image->update([
                    'url'=>$url,
                ]);
            }else{
                $receta->image()->create([
                    'url'=>$url
                ]); 
            }                        
        }else{
            if($request->remover_imagen=='1'){
                Storage::delete($receta->image->url);
                $receta->image()->delete();
            }
        }
        return redirect()->route('admin.recetas.index')->with('toast_success','Se edito correctamente!!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Receta $receta)
    {
        Storage::delete($receta->image->url);
        $receta->image()->delete();
        $receta->delete();
        return redirect()->route('admin.recetas.index')->with('toast_success','Se elimino correctamente!!!');
    }
}
