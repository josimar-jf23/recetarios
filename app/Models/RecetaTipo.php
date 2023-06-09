<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecetaTipo extends Model
{
    use HasFactory;

    protected $table="receta_tipos";

    protected $fillable=['nombre','slug','descripcion','orden'];

    public function recetas(){
        return $this->hasMany(Receta::class);
    }
}
