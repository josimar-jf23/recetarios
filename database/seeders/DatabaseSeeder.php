<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
             'name' => 'Administrador',
             'email' => 'admin@admin.com',
             'password'=>Hash::make("admin123+")
         ]);
        $this->call(CategoriaSeeder::class);
        $this->call(UtensiloSeeder::class);
        $this->call(IngredienteSeeder::class);
        $this->call(UnidadMedidaSeeder::class);
        $this->call(RecetaTipoSeeder::class);
    }
}
