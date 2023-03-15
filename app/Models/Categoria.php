<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $table="categorias";

    protected $fillable=['nombre','descripcion','orden','parent_id','parents'];

    protected $hidden = ['updated_at'];

    public function parent(){
        return $this->belongsTo(Categoria::class);
    }

    public function categorias(){
        return $this->hasMany(Categoria::class);
    }

    public function ingredientes(){
        return $this->hasMany(Ingrediente::class);
    }
}
