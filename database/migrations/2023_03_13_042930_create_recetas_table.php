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
            $table->string('slug');
            $table->text('descripcion')->nullable();
            $table->text('indicaciones')->nullable();
            $table->tinyInteger('estado')->default(1);
            $table->dateTime('fecha')->default(date("Y-m-d H:i:s"));
            $table->unsignedBigInteger('receta_tipo_id');
            $table->unsignedBigInteger('user_id')->default('1');
            $table->foreign('receta_tipo_id')->references('id')->on('receta_tipos');
            $table->foreign('user_id')->references('id')->on('users');
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
