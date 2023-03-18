<?php

namespace Database\Seeders;

use App\Models\UnidadMedida;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnidadMedidaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $unidades=UnidadMedida::insert([
            ['nombre'=>"Decilitro",'abreviatura'=>"dl"],
            ['nombre'=>"Centilitro",'abreviatura'=>"cl"],
            ['nombre'=>"Mililitro",'abreviatura'=>"ml"],
            ['nombre'=>"Litro",'abreviatura'=>"l"],
            ['nombre'=>"Onzas Fluidas",'abreviatura'=>"fl oz"],
            ['nombre'=>"Onzas",'abreviatura'=>"oz"],
            ['nombre'=>"Gramos",'abreviatura'=>"grs"],
            ['nombre'=>"Kilogramos",'abreviatura'=>"kg"],
            ['nombre'=>"Centimetros Cubicos",'abreviatura'=>"cc"],
            ['nombre'=>"Gotas",'abreviatura'=>"gotas"],
        ]);
    }
}
