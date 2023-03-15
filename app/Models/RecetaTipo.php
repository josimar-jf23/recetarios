<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecetaTipo extends Model
{
    use HasFactory;

    protected $table="receta_detalles";

    protected $fillable=['nombre','descripcion','orden'];

    public function receta(){
        return $this->hasMany(Receta::class);
    }
}
