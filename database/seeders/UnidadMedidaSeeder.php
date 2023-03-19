<?php

namespace Database\Seeders;

use App\Models\UnidadMedida;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UnidadMedidaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $unidades=UnidadMedida::insert([
            ['nombre'=>"Decilitro",'abreviatura'=>"dl",'slug'=>Str::slug("Decilitro"."-".date("YmdHis"))],
            ['nombre'=>"Centilitro",'abreviatura'=>"cl",'slug'=>Str::slug("Centilitro"."-".date("YmdHis"))],
            ['nombre'=>"Mililitro",'abreviatura'=>"ml",'slug'=>Str::slug("Mililitro"."-".date("YmdHis"))],
            ['nombre'=>"Litro",'abreviatura'=>"l",'slug'=>Str::slug("Litro"."-".date("YmdHis"))],
            ['nombre'=>"Onzas Fluidas",'abreviatura'=>"fl oz",'slug'=>Str::slug("Onzas Fluidas"."-".date("YmdHis"))],
            ['nombre'=>"Onzas",'abreviatura'=>"oz",'slug'=>Str::slug("Onzas"."-".date("YmdHis"))],
            ['nombre'=>"Gramos",'abreviatura'=>"grs",'slug'=>Str::slug("Gramos"."-".date("YmdHis"))],
            ['nombre'=>"Kilogramos",'abreviatura'=>"kg",'slug'=>Str::slug("Kilogramos"."-".date("YmdHis"))],
            ['nombre'=>"Centimetros Cubicos",'abreviatura'=>"cc",'slug'=>Str::slug("Centimetros Cubicos"."-".date("YmdHis"))],
            ['nombre'=>"Gotas",'abreviatura'=>"gotas",'slug'=>Str::slug("Gotas"."-".date("YmdHis"))],
        ]);
    }
}
