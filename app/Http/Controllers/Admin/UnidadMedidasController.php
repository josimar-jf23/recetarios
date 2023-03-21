<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UnidadMedida;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UnidadMedidasController extends Controller
{
    public function index()
    {
        $unidad_medidas=UnidadMedida::paginate(10);
        return view('admin.unidad_medidas.index',compact('unidad_medidas'));
    }

    public function create()
    {
        return view('admin.unidad_medidas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>'required|unique:unidad_medidas,nombre'
        ]);
        $unidad_medida=UnidadMedida::create([
            'nombre'        => $request->nombre,
            'abreviatura'   => $request->abreviatura,
            'slug'          => Str::slug($request->nombre.date("YmdHis")),
            'descripcion'   => $request->descripcion,
        ]);
        return redirect()->route('admin.unidad_medidas.index')->with('toast_success','Se creo correctamente!!!');
    }

    public function show(UnidadMedida $unidad_medida)
    {
        return view('admin.unidad_medidas.show',compact('unidad_medida'));
    }

    public function edit(UnidadMedida $unidad_medida)
    {
        return view('admin.unidad_medidas.edit',compact('unidad_medida'));
    }

    public function update(Request $request, UnidadMedida $unidad_medida)
    {
        $request->validate([
            'nombre'=>"required|unique:unidad_medidas,nombre,$unidad_medida->id",
        ]);
        $unidad_medida->update([
            'nombre'        => $request->nombre,
            'abreviatura'   => $request->abreviatura,
            'slug'          => Str::slug($request->nombre.date("YmdHis")),
            'descripcion'   => $request->descripcion,
        ]);
        return redirect()->route('admin.unidad_medidas.index')->with('toast_success','Se edito correctamente!!!');
    }

    public function destroy(UnidadMedida $unidad_medida)
    {
        $unidad_medida->delete();
        return redirect()->route('admin.unidad_medidas.index')->with('toast_success','Se elimino correctamente!!!');
    }
}
