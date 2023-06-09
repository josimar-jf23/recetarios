<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model
{
    use HasFactory;

    protected $table="ingredientes";

    protected $fillable=['nombre','slug','descripcion','categoria_id'];

    protected $hidden = ['updated_at'];

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    public function receta_detalle(){
        return $this->hasOne(RecetaDetalle::class);
    }

    //relacion una a uno polimorfica
    public function image(){
        return $this->morphOne(Image::class,'imageable');
    }
}
