<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ingrediente;
use App\Models\Receta;
use App\Models\RecetaDetalle;
use App\Models\UnidadMedida;
use Illuminate\Http\Request;

class RecetaDetallesController extends Controller
{
    public function index(Receta $receta)
    {
        $receta_detalles=RecetaDetalle::where('receta_id',$receta->id)
                                        ->orderBy('ingrediente_id', 'asc')
                                        ->paginate(10);
        return view('admin.receta_detalles.index',compact('receta_detalles','receta'));
       
    }

    public function create(Receta $receta)
    {
        $ingredientes=Ingrediente::all();
        $unidad_medidas=UnidadMedida::all();
        return view('admin.receta_detalles.create',compact('receta','ingredientes','unidad_medidas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ingrediente_id'=>'required',
            'cantidad'=>'required|decimal:0,4',
            'receta_id'=>'required'
        ]);
        $receta_detalle=RecetaDetalle::create([
            'ingrediente_id'    => $request->ingrediente_id,
            'unidad_medida_id'  => $request->unidad_medida_id,
            'cantidad'          => $request->cantidad,
            'adicional'         => $request->adicional,
            'receta_id'         => $request->receta_id,
        ]);
        $receta=$receta_detalle->receta;
        return redirect()->route('admin.receta_detalles.index',$receta)->with('toast_success','Se creo correctamente!!!');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(RecetaDetalle $receta_detalle)
    {
        $ingredientes=Ingrediente::all();
        $unidad_medidas=UnidadMedida::all();
        $receta=$receta_detalle->receta;
        return view('admin.receta_detalles.edit',compact('receta_detalle','receta','ingredientes','unidad_medidas'));
    }

    public function update(Request $request, RecetaDetalle $receta_detalle)
    {
        $request->validate([
            'ingrediente_id'=>'required',
            //'unidad_medida_id'=>'required',
            'cantidad'=>'required|decimal:0,4',
            'receta_id'=>'required'
        ]);

        $receta_detalle->update([
            'ingrediente_id'    => $request->ingrediente_id,
            'unidad_medida_id'  => $request->unidad_medida_id,
            'cantidad'          => $request->cantidad,
            'adicional'         => $request->adicional,
        ]);
        $receta=$receta_detalle->receta;
        return redirect()->route('admin.receta_detalles.index',$receta)->with('toast_success','Se edito correctamente!!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RecetaDetalle $receta_detalle)
    {
        $receta=$receta_detalle->receta;
        $receta_detalle->delete();
        return redirect()->route('admin.receta_detalles.index',$receta)->with('toast_success','Se elimino correctamente!!!');
    }
}
