<?php

namespace Database\Seeders;

use App\Models\Utensilio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UtensiloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $utensilios=Utensilio::insert([
            ['nombre'=>"Coctelera"],
            ['nombre'=>"Mesclador"],
            ['nombre'=>"Licuadora"],
            ['nombre'=>"Cucharilla de bar"],
            ['nombre'=>"Colador"],
            ['nombre'=>"Dosificador"],
            ['nombre'=>"Cuchillo Mondador"],
            ['nombre'=>"Sacacorcho"],
            ['nombre'=>"Rallador"],
            ['nombre'=>"Hielera"],
            ['nombre'=>"Ponchera"],
            ['nombre'=>"Cuchillo"],
        ]);
    }
}
