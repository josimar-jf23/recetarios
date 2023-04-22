<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Receta;
use App\Models\RecetaIndicacion;
use Illuminate\Http\Request;

class RecetaIndicacionesController extends Controller
{
    public function index(Receta $receta)
    {
        $receta_indicaciones=RecetaIndicacion::where('receta_id',$receta->id)
                                        ->paginate(10);
        return view('admin.receta_indicaciones.index',compact('receta_indicaciones','receta'));
       
    }

    public function create(Receta $receta)
    {
        return view('admin.receta_indicaciones.create',compact('receta'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'indicacion'=>'required',
            'receta_id'=>'required'
        ]);
        $receta_indicacion=RecetaIndicacion::create([
            'indicacion'        => $request->indicacion,
            'orden'             => $request->orden,
            'receta_id'         => $request->receta_id,
        ]);
        $receta=$receta_indicacion->receta;
        return redirect()->route('admin.receta_indicaciones.index',$receta)->with('toast_success','Se creo correctamente!!!');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(RecetaIndicacion $receta_indicacion)
    {
        $receta=$receta_indicacion->receta;
        return view('admin.receta_indicaciones.edit',compact('receta_indicacion','receta'));
    }

    public function update(Request $request, RecetaIndicacion $receta_indicacion)
    {
        $request->validate([
            'indicacion'=>'required',
        ]);

        $receta_indicacion->update([
            'indicacion'    => $request->indicacion,
            'orden'          => $request->orden
        ]);
        $receta=$receta_indicacion->receta;
        return redirect()->route('admin.receta_indicaciones.index',$receta)->with('toast_success','Se edito correctamente!!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RecetaIndicacion $receta_indicacion)
    {
        $receta=$receta_indicacion->receta;
        $receta_indicacion->delete();
        return redirect()->route('admin.receta_indicaciones.index',$receta)->with('toast_success','Se elimino correctamente!!!');
    }
}
