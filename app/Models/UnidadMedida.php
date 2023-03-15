<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnidadMedida extends Model
{
    use HasFactory;

    protected $table="unidad_medidas";

    protected $fillable=['descripcion','abreviatura '];

    public function receta_detalles(){
        return $this->hasMany(RecetaDetalle::class);
    }
}
