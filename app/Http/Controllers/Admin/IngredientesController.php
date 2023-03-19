<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Ingrediente;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class IngredientesController extends Controller
{
    
    public function index()
    {
        $ingredientes=Ingrediente::with('categoria')
                                    ->orderBy('categoria_id','asc')
                                    ->orderBy('nombre', 'asc')
                                    ->paginate(10);
        return view('admin.ingredientes.index',compact('ingredientes'));
    }

    public function create()
    {
        $categorias=Categoria::all();
        return view('admin.ingredientes.create',compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>'required',
            'categoria_id'=>'required'
        ]);
        $ingrediente=Ingrediente::create([
            'nombre'        => $request->nombre,
            'slug'          => Str::slug($request->nombre.date("YmdHis")),
            'descripcion'   => $request->descripcion,
            'categoria_id'  => $request->categoria_id
        ]);
        return redirect()->route('admin.ingredientes.index')->with('toast_success','Se creo correctamente!!!');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Ingrediente $ingrediente)
    {
        $categorias=Categoria::all();
        return view('admin.ingredientes.edit',compact('ingrediente','categorias'));
    }

    public function update(Request $request, Ingrediente $ingrediente)
    {
        $request->validate([
            'nombre'=>'required',
            'categoria_id'=>'required'
        ]);
        $ingrediente->update([
            'nombre'        => $request->nombre,
            'slug'          => Str::slug($request->nombre.date("YmdHis")),
            'descripcion'   => $request->descripcion,
            'categoria_id'  => $request->categoria_id,
        ]);
        return redirect()->route('admin.ingredientes.index')->with('toast_success','Se edito correctamente!!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ingrediente $ingrediente)
    {
        $ingrediente->delete();
        return redirect()->route('admin.ingredientes.index')->with('toast_success','Se elimino correctamente!!!');
    }
}
