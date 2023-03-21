<?php

use App\Http\Controllers\Admin\CategoriasController;
use App\Http\Controllers\Admin\IngredientesController;
use App\Http\Controllers\Admin\RecetaTiposController;
use App\Http\Controllers\Admin\UnidadMedidasController;
use App\Http\Controllers\Admin\UtensiliosController;
use Illuminate\Support\Facades\Route;

Route::resource('categorias', CategoriasController::class)->names('admin.categorias');
Route::resource('ingredientes', IngredientesController::class)->names('admin.ingredientes');
Route::resource('receta_tipos', RecetaTiposController::class)->names('admin.receta_tipos');
Route::resource('utensilios', UtensiliosController::class)->names('admin.utensilios');
Route::resource('unidad_medidas', UnidadMedidasController::class)->names('admin.unidad_medidas');