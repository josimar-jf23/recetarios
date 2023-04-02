<?php

namespace App\Http\Controllers;

use App\Models\Receta;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index(){
        $recetas=Receta::with('image')
                        ->orderBy('receta_tipo_id','asc')
                        ->orderBy('nombre', 'asc')
                        ->get();
        return view('welcome',compact('recetas'));
    }
}
