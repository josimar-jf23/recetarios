<?php

namespace App\Http\Controllers;

use App\Models\Receta;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index(Request $request){

        $search=$request->search;
        $query_receta='';
        if(!empty($search)){
            $recetas=Receta::with('image')
                        ->with('receta_tipo')
                        ->where('estado','1')
                        ->where(function($query) use($search) {
                            $query->where('nombre','like','%'.$search.'%')
                            ->orWhere('descripcion','like','%'.$search.'%')
                            ->orWhere('indicaciones','like','%'.$search.'%');
                        })
                        ->orderBy('receta_tipo_id','asc')
                        ->orderBy('nombre', 'asc')
                        ->paginate(4);
                        //->toSql();
            
        }else{
            $recetas=Receta::with('image')
            ->where('estado','1')
            ->orderBy('receta_tipo_id','asc')
            ->orderBy('nombre', 'asc')
            ->paginate(12);
            //->toSql();
        }
        return view('welcome',compact('recetas','search','query_receta'));
    }

    public function receta(Receta $receta){
        if($receta){
            if($receta->estado == '2'){
                abort('404');
            }
        }

        return view('receta',compact('receta'));
    }
}
