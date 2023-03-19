<?php

namespace Database\Seeders;

use App\Models\RecetaTipo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RecetaTipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $receta_tipos=RecetaTipo::insert([
            [
                'nombre'=>"Cocteles",
                'slug'=>Str::slug("Cocteles"."-".date("YmdHis")),
                'orden'=>"1",
                'descripcion'=>"Preparacion en base de una mezcla de diferentes bebidas en diferentes proporciones, que contienen por lo general unos o mas tipos de bebidas alcoholicas junto a otros ingredientes."],
            [
                'nombre'=>"Postres",
                'slug'=>Str::slug("Postres"."-".date("YmdHis")),
                'orden'=>"2",
                'descripcion'=>""],
            [
                'nombre'=>"Entradas",
                'slug'=>Str::slug("Entradas"."-".date("YmdHis")),
                'orden'=>"3",
                'descripcion'=>""
            ],
        ]);
    }
}
