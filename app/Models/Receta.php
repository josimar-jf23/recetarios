<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    use HasFactory;

    protected $table="recetas";

    protected $fillable=['nombre','slug','descripcion','indicaciones','receta_tipo_id'];

    public function receta_tipo(){
        return $this->belongsTo(RecetaTipo::class);
    }
    
    public function receta_detalle(){
        return $this->hasMany(RecetaDetalle::class);
    }
    public function receta_indicacions(){
        return $this->hasMany(RecetaIndicacion::class);
    }

    public function receta_utensilio(){
        return $this->hasMany(RecetaUtensilio::class);
    }

    //relacion una a uno polimorfica
    public function image(){
        return $this->morphOne(Image::class,'imageable');
    }
}
