<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Utensilio;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UtensiliosController extends Controller
{
    public function index()
    {
        $utensilios=Utensilio::paginate(10);
        return view('admin.utensilios.index',compact('utensilios'));
    }

    public function create()
    {
        return view('admin.utensilios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>'required|unique:utensilios,nombre'
        ]);
        $utensilio=Utensilio::create([
            'nombre'        => $request->nombre,
            'slug'          => Str::slug($request->nombre.date("YmdHis")),
            'descripcion'   => $request->descripcion,
        ]);
        return redirect()->route('admin.utensilios.index')->with('toast_success','Se creo correctamente!!!');
    }

    public function show(Utensilio $utensilio)
    {
        return view('admin.utensilios.show',compact('utensilio'));
    }

    public function edit(Utensilio $utensilio)
    {
        return view('admin.utensilios.edit',compact('utensilio'));
    }

    public function update(Request $request, Utensilio $utensilio)
    {
        $request->validate([
            'nombre'=>"required|unique:utensilios,nombre,$utensilio->id",
        ]);
        $utensilio->update([
            'nombre'        => $request->nombre,
            'slug'          => Str::slug($request->nombre.date("YmdHis")),
            'descripcion'   => $request->descripcion,
            'orden'         => $request->orden,
        ]);
        return redirect()->route('admin.utensilios.index')->with('toast_success','Se edito correctamente!!!');
    }

    public function destroy(Utensilio $utensilio)
    {
        $utensilio->delete();
        return redirect()->route('admin.utensilios.index')->with('toast_success','Se elimino correctamente!!!');
    }
}
