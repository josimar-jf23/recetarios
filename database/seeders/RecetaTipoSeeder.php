<?php

namespace Database\Seeders;

use App\Models\Receta;
use App\Models\RecetaTipo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class RecetaTipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $receta_tipos_1=RecetaTipo::create([
                'nombre'=>"Cocteles",
                'slug'=>Str::slug("Cocteles"."-".date("YmdHis")),
                'orden'=>"1",
                'descripcion'=>"Preparacion en base de una mezcla de diferentes bebidas en diferentes proporciones, que contienen por lo general unos o mas tipos de bebidas alcoholicas junto a otros ingredientes."
        ]);
        $receta=Receta::insert([
            [
                'nombre'=>"Piña colada",
                'slug'=>Str::slug("Piña colada"."-".date("YmdHis")),
                'descripcion'=>$faker->text($maxNbChars = 200),
                'indicaciones'=>$faker->text($maxNbChars = 200),
                'receta_tipo_id'=>'1'
            ],
            [
                'nombre'=>"Cuba Libre",
                'slug'=>Str::slug("Cuba Libre"."-".date("YmdHis")),
                'descripcion'=>$faker->text($maxNbChars = 200),
                'indicaciones'=>$faker->text($maxNbChars = 200),
                'receta_tipo_id'=>'1'
            ],
            [
                'nombre'=>"Margarita",
                'slug'=>Str::slug("Margarita"."-".date("YmdHis")),
                'descripcion'=>$faker->text($maxNbChars = 200),
                'indicaciones'=>$faker->text($maxNbChars = 200),
                'receta_tipo_id'=>'1'
            ],
            [
                'nombre'=>"Daiquiri",
                'slug'=>Str::slug("Daiquiri"."-".date("YmdHis")),
                'descripcion'=>$faker->text($maxNbChars = 200),
                'indicaciones'=>$faker->text($maxNbChars = 200),
                'receta_tipo_id'=>'1'
            ],
            [
                'nombre'=>"Margarita Frozzen",
                'slug'=>Str::slug("Margarita Frozzen"."-".date("YmdHis")),
                'descripcion'=>$faker->text($maxNbChars = 200),
                'indicaciones'=>$faker->text($maxNbChars = 200),
                'receta_tipo_id'=>'1'
            ],
            [
                'nombre'=>"Daiquiri Frozeen",
                'slug'=>Str::slug("Daiquiri Frozeen"."-".date("YmdHis")),
                'descripcion'=>$faker->text($maxNbChars = 200),
                'indicaciones'=>$faker->text($maxNbChars = 200),
                'receta_tipo_id'=>'1'
            ],
            [
                'nombre'=>"Mojito",
                'slug'=>Str::slug("Mojito"."-".date("YmdHis")),
                'descripcion'=>$faker->text($maxNbChars = 200),
                'indicaciones'=>$faker->text($maxNbChars = 200),
                'receta_tipo_id'=>'1'
            ],
            [
                'nombre'=>"Old Fashioned",
                'slug'=>Str::slug("Old Fashioned"."-".date("YmdHis")),
                'descripcion'=>$faker->text($maxNbChars = 200),
                'indicaciones'=>$faker->text($maxNbChars = 200),
                'receta_tipo_id'=>'1'
            ]
        ]);
        
        $receta_tipos_2=RecetaTipo::create([
                'nombre'=>"Postres",
                'slug'=>Str::slug("Postres"."-".date("YmdHis")),
                'orden'=>"2",
                'descripcion'=>$faker->text($maxNbChars = 200)
        ]);
        $receta_tipos_3=RecetaTipo::create([
                'nombre'=>"Entradas",
                'slug'=>Str::slug("Entradas"."-".date("YmdHis")),
                'orden'=>"3",
                'descripcion'=>$faker->text($maxNbChars = 200)
        ]);
    }
}
