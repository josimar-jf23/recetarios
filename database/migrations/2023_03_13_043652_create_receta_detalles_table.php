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
        Schema::create('receta_detalles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ingrediente',150);
            $table->string('adicional',200)->nullable();
            $table->decimal('cantidad', 15, 4)->default('0');
            $table->unsignedBigInteger('ingrediente_id');
            $table->unsignedBigInteger('unidad_medida_id');
            $table->foreign('ingrediente_id')->references('id')->on('receta_tipos');
            $table->foreign('unidad_medida_id')->references('id')->on('unidad_medidas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receta_detalles');
    }
};
