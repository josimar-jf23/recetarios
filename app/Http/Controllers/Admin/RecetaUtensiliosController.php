<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Receta;
use App\Models\RecetaUtensilio;
use App\Models\Utensilio;
use Illuminate\Http\Request;

class RecetaUtensiliosController extends Controller
{
    public function index(Receta $receta)
    {
        $receta_utensilios=RecetaUtensilio::where('receta_id',$receta->id)
                                        ->orderBy('utensilio_id', 'asc')
                                        ->paginate(10);
        return view('admin.receta_utensilios.index',compact('receta_utensilios','receta'));
       
    }

    public function create(Receta $receta)
    {
        $utensilios=Utensilio::all();
        return view('admin.receta_utensilios.create',compact('receta','utensilios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'utensilio_id'=>'required',
            'receta_id'=>'required'
        ]);
        $receta_utensilio=RecetaUtensilio::create([
            'utensilio_id'      => $request->utensilio_id,
            'descripcion'          => $request->descripcion,
            'receta_id'         => $request->receta_id,
        ]);
        $receta=$receta_utensilio->receta;
        return redirect()->route('admin.receta_utensilios.index',$receta)->with('toast_success','Se creo correctamente!!!');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(RecetaUtensilio $receta_utensilio)
    {
        $utensilios=Utensilio::all();
        $receta=$receta_utensilio->receta;
        return view('admin.receta_utensilios.edit',compact('receta_utensilio','receta','utensilios'));
    }

    public function update(Request $request, RecetaUtensilio $receta_utensilio)
    {
        $request->validate([
            'utensilio_id'=>'required',
            'receta_id'=>'required'
        ]);

        $receta_utensilio->update([
            'utensilio_id'      => $request->utensilio_id,
            'descripcion'          => $request->descripcion,
        ]);
        $receta=$receta_utensilio->receta;
        return redirect()->route('admin.receta_utensilios.index',$receta)->with('toast_success','Se edito correctamente!!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RecetaUtensilio $receta_utensilio)
    {
        $receta=$receta_utensilio->receta;
        $receta_utensilio->delete();
        return redirect()->route('admin.receta_utensilios.index',$receta)->with('toast_success','Se elimino correctamente!!!');
    }
}
