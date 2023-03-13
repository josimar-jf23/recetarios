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
        Schema::create('recetas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre',150);
            $table->string('descripcion',150)->nullable();
            $table->text('indicaciones')->nullable();
            $table->unsignedBigInteger('receta_tipo_id');
            $table->foreign('receta_tipo_id')->references('id')->on('receta_tipos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recetas');
    }
};
