<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utensilio extends Model
{
    use HasFactory;

    protected $table="utensilios";

    protected $fillable=['nombre','descripcion'];

    public function receta_utensilios(){
        return $this->hasMany(RecetaUtensilio::class);
    }
    
    //relacion una a uno polimorfica
    public function image(){
        return $this->morphMany(Image::class,'imageable');
    }

}
