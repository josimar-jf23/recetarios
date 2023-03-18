<?php

namespace Database\Seeders;

use App\Models\Ingrediente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IngredienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ingredientes=Ingrediente::insert([
            ['nombre'=>"Manzana",'categoria_id'=>"1"],
            ['nombre'=>"Naranja",'categoria_id'=>"1"],
            ['nombre'=>"Fresa",'categoria_id'=>"1"],
            ['nombre'=>"Piña",'categoria_id'=>"1"],
            ['nombre'=>"Menta",'categoria_id'=>"2"],
            ['nombre'=>"Hierba Buena",'categoria_id'=>"2"],
            ['nombre'=>"Albahaca",'categoria_id'=>"2"],
            ['nombre'=>"Limón",'categoria_id'=>"2"],
            ['nombre'=>"Pisco",'categoria_id'=>"3"],
            ['nombre'=>"Vino",'categoria_id'=>"3"],
            ['nombre'=>"Whisky",'categoria_id'=>"3"],
            ['nombre'=>"Vodka",'categoria_id'=>"3"],
            ['nombre'=>"Azucar",'categoria_id'=>"4"],
            ['nombre'=>"Sal",'categoria_id'=>"4"],
            ['nombre'=>"Cafe",'categoria_id'=>"4"],
            ['nombre'=>"Canela",'categoria_id'=>"4"],
        ]);
    }
}
