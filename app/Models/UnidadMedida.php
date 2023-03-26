<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnidadMedida extends Model
{
    use HasFactory;

    protected $table="unidad_medidas";

    protected $fillable=['nombre','slug','abreviatura','descripcion'];

    public function receta_detalles(){
        return $this->hasOne(RecetaDetalle::class);
    }
}
