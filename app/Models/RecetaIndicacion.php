<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecetaIndicacion extends Model
{
    use HasFactory;

    protected $table="receta_indicacions";
    protected $fillable=['indicacion','orden','receta_id'];

    public function receta(){
        return $this->belongsTo(Receta::class);
    }
}
