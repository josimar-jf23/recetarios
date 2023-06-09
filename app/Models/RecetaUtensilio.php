<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecetaUtensilio extends Model
{
    use HasFactory;
    protected $table="receta_utensilios";

    protected $fillable=['descripcion','utensilio_id','receta_id'];

    public function receta(){
        return $this->belongsTo(Receta::class);
    }

    public function utensilio(){
        return $this->belongsTo(Utensilio::class);
    }
}
