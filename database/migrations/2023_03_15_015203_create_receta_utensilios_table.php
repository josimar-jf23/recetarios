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
        Schema::create('receta_utensilios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('descripcion',200)->nullable();
            $table->unsignedBigInteger('utensilio_id');
            $table->foreign('utensilio_id')->references('id')->on('utensilios');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receta_utensilios');
    }
};
