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

    public function receta_detalles(){
        return $this->hasMany(RecetaDetalle::class);
    }

    //relacion una a uno polimorfica
    public function images(){
        return $this->morphMany(Image::class,'imageable');
    }
}
