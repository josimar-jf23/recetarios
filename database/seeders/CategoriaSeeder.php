<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use function PHPSTORM_META\map;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = Categoria::insert([
            ['nombre'=>"Frutas"],
            ['nombre'=>"Verduras"],
            ['nombre'=>"Licores"],
            ['nombre'=>"Condimentos"],
        ]);       
    }
}
