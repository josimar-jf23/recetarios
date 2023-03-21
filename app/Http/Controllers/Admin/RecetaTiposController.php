<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RecetaTipo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RecetaTiposController extends Controller
{
    public function index()
    {
        $receta_tipos=RecetaTipo::paginate(10);
        return view('admin.receta_tipos.index',compact('receta_tipos'));
    }

    public function create()
    {
        return view('admin.receta_tipos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>'required|unique:receta_tipos,nombre'
        ]);
        $receta_tipo=RecetaTipo::create([
            'nombre'        => $request->nombre,
            'slug'          => Str::slug($request->nombre.date("YmdHis")),
            'descripcion'   => $request->descripcion,
            'orden'         => $request->orden,
        ]);
        return redirect()->route('admin.receta_tipos.index')->with('toast_success','Se creo correctamente!!!');
    }

    public function show(RecetaTipo $receta_tipo)
    {
        return view('admin.receta_tipos.show',compact('receta_tipo'));
    }

    public function edit(RecetaTipo $receta_tipo)
    {
        return view('admin.receta_tipos.edit',compact('receta_tipo'));
    }

    public function update(Request $request, RecetaTipo $receta_tipo)
    {
        $request->validate([
            'nombre'=>"required|unique:receta_tipos,nombre,$receta_tipo->id",
        ]);
        $receta_tipo->update([
            'nombre'        => $request->nombre,
            'slug'          => Str::slug($request->nombre.date("YmdHis")),
            'descripcion'   => $request->descripcion,
            'orden'         => $request->orden,
        ]);
        return redirect()->route('admin.receta_tipos.index')->with('toast_success','Se edito correctamente!!!');
    }

    public function destroy(RecetaTipo $receta_tipo)
    {
        $receta_tipo->delete();
        return redirect()->route('admin.receta_tipos.index')->with('toast_success','Se elimino correctamente!!!');
    }
}
