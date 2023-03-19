<?php

namespace Database\Seeders;

use App\Models\Utensilio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UtensiloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $utensilios=Utensilio::insert([
            ['nombre'=>"Coctelera",'slug'=>Str::slug("Coctelera"."-".date("YmdHis"))],
            ['nombre'=>"Mesclador",'slug'=>Str::slug("Mesclador"."-".date("YmdHis"))],
            ['nombre'=>"Licuadora",'slug'=>Str::slug("Licuadora"."-".date("YmdHis"))],
            ['nombre'=>"Cucharilla de bar",'slug'=>Str::slug("Cucharilla de bar"."-".date("YmdHis"))],
            ['nombre'=>"Colador",'slug'=>Str::slug("Colador"."-".date("YmdHis"))],
            ['nombre'=>"Dosificador",'slug'=>Str::slug("Dosificador"."-".date("YmdHis"))],
            ['nombre'=>"Cuchillo Mondador",'slug'=>Str::slug("Cuchillo Mondador"."-".date("YmdHis"))],
            ['nombre'=>"Sacacorcho",'slug'=>Str::slug("Sacacorcho"."-".date("YmdHis"))],
            ['nombre'=>"Rallador",'slug'=>Str::slug("Rallador"."-".date("YmdHis"))],
            ['nombre'=>"Hielera",'slug'=>Str::slug("Hielera"."-".date("YmdHis"))],
            ['nombre'=>"Ponchera",'slug'=>Str::slug("Ponchera"."-".date("YmdHis"))],
            ['nombre'=>"Cuchillo",'slug'=>Str::slug("Cuchillo"."-".date("YmdHis"))],
        ]);
    }
}
