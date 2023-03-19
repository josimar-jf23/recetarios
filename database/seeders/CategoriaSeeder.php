<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = Categoria::insert([
            ['nombre'=>"Frutas",'slug'=>Str::slug("Frutas"."-".date("YmdHis"))],
            ['nombre'=>"Verduras",'slug'=>Str::slug("Verduras"."-".date("YmdHis"))],
            ['nombre'=>"Licores",'slug'=>Str::slug("Licores"."-".date("YmdHis"))],
            ['nombre'=>"Condimentos",'slug'=>Str::slug("Condimentos"."-".date("YmdHis"))],
        ]);       
    }
}
