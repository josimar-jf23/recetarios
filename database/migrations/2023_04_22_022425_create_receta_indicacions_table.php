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
        Schema::create('receta_indicacions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('indicacion');
            $table->integer('orden')->default('0');
            $table->unsignedBigInteger('receta_id');
            $table->foreign('receta_id')->references('id')->on('recetas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receta_indicacions');
    }
};
