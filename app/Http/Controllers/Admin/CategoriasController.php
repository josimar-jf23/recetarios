<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoriasController extends Controller
{
    public function index()
    {
        $categorias=Categoria::with('ingredientes')->paginate(10);
        return view('admin.categorias.index',compact('categorias'));
    }

    public function create()
    {
        return view('admin.categorias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>'required|unique:categorias,nombre'
        ]);
        $categoria=Categoria::create([
            'nombre'        => $request->nombre,
            'slug'          => Str::slug($request->nombre.date("YmdHis")),
            'descripcion'   => $request->descripcion,
        ]);
        return redirect()->route('admin.categorias.index')->with('toast_success','Se creo correctamente!!!');
    }

    public function show(Categoria $categoria)
    {
        return view('admin.categorias.show',compact('categoria'));
    }

    public function edit(Categoria $categoria)
    {
        return view('admin.categorias.edit',compact('categoria'));
    }

    public function update(Request $request, Categoria $categoria)
    {
        $request->validate([
            'nombre'=>"required|unique:categorias,nombre,$categoria->id",
        ]);
        $categoria->update([
            'nombre'        => $request->nombre,
            'slug'          => Str::slug($request->nombre.date("YmdHis")),
            'descripcion'   => $request->descripcion,
            'orden'         => $request->orden,
        ]);
        return redirect()->route('admin.categorias.index')->with('toast_success','Se edito correctamente!!!');
    }

    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('admin.categorias.index')->with('toast_success','Se elimino correctamente!!!');
    }
}
