<?php

namespace App\Http\Controllers;

use App\Models\Receta;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index(Request $request){

        if(!empty($request->search)){
            $recetas=Receta::with('image')
                        ->with('receta_tipo')
                        ->where('nombre','like','%'.$request->search.'%')
                        ->orWhere('descripcion','like','%'.$request->search.'%')
                        ->orWhere('indicaciones','like','%'.$request->search.'%')
                        ->orderBy('receta_tipo_id','asc')
                        ->orderBy('nombre', 'asc')
                        ->get();
            
        }else{
            $recetas=Receta::with('image')
            ->orderBy('receta_tipo_id','asc')
            ->orderBy('nombre', 'asc')
            ->get();
        }
        return view('welcome',compact('recetas'));
    }
}
