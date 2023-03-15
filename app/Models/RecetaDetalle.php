<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecetaDetalle extends Model
{
    use HasFactory;

    protected $table="receta_detalles";

    protected $fillable=['ingrediente','adicional','cantidad','ingrediente_id','unidad_medida_id'];

    public function ingrediente(){
        return $this->belongsTo(Ingrediente::class);
    }
    public function unidad_medida(){
        return $this->belongsTo(UnidadMedida::class);
    }
}
