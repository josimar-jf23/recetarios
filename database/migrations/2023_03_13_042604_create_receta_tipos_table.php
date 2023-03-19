<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('receta_tipos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre',150);
            $table->string('slug');
            $table->string('descripcion',250)->nullable();
            $table->integer('orden')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receta_tipos');
    }
};
