<?php

namespace Database\Seeders;

use App\Models\Ingrediente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class IngredienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ingredientes=Ingrediente::insert([
            ['nombre'=>"Manzana",'categoria_id'=>"1",'slug'=>Str::slug("Manzana"."-".date("YmdHis"))],
            ['nombre'=>"Naranja",'categoria_id'=>"1",'slug'=>Str::slug("Naranja"."-".date("YmdHis"))],
            ['nombre'=>"Fresa",'categoria_id'=>"1",'slug'=>Str::slug("Fresa"."-".date("YmdHis"))],
            ['nombre'=>"Piña",'categoria_id'=>"1",'slug'=>Str::slug("Piña"."-".date("YmdHis"))],
            ['nombre'=>"Menta",'categoria_id'=>"2",'slug'=>Str::slug("Menta"."-".date("YmdHis"))],
            ['nombre'=>"Hierba Buena",'categoria_id'=>"2",'slug'=>Str::slug("Hierba Buena"."-".date("YmdHis"))],
            ['nombre'=>"Albahaca",'categoria_id'=>"2",'slug'=>Str::slug("Albahaca"."-".date("YmdHis"))],
            ['nombre'=>"Limón",'categoria_id'=>"2",'slug'=>Str::slug("Limón"."-".date("YmdHis"))],
            ['nombre'=>"Pisco",'categoria_id'=>"3",'slug'=>Str::slug("Pisco"."-".date("YmdHis"))],
            ['nombre'=>"Vino",'categoria_id'=>"3",'slug'=>Str::slug("Vino"."-".date("YmdHis"))],
            ['nombre'=>"Whisky",'categoria_id'=>"3",'slug'=>Str::slug("Whisky"."-".date("YmdHis"))],
            ['nombre'=>"Vodka",'categoria_id'=>"3",'slug'=>Str::slug("Vodka"."-".date("YmdHis"))],
            ['nombre'=>"Azucar",'categoria_id'=>"4",'slug'=>Str::slug("Azucar"."-".date("YmdHis"))],
            ['nombre'=>"Sal",'categoria_id'=>"4",'slug'=>Str::slug("Sal"."-".date("YmdHis"))],
            ['nombre'=>"Cafe",'categoria_id'=>"4",'slug'=>Str::slug("Cafe"."-".date("YmdHis"))],
            ['nombre'=>"Canela",'categoria_id'=>"4",'slug'=>Str::slug("Canela"."-".date("YmdHis"))],
        ]);
    }
}
