<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    use HasFactory;

    protected $table="recetas";

    protected $fillable=['nombre','slug','descripcion','indicaciones','receta_tipo_id'];

    public function receta_tipos(){
        return $this->belongsTo(RecetaTipo::class);
    }
    
    //relacion una a uno polimorfica
    public function images(){
        return $this->morphMany(Image::class,'imageable');
    }
}
