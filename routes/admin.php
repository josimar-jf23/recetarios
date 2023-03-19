<?php

use App\Http\Controllers\Admin\CategoriasController;
use App\Http\Controllers\Admin\IngredientesController;
use Illuminate\Support\Facades\Route;

Route::resource('categorias', CategoriasController::class)->names('admin.categorias');
Route::resource('ingredientes', IngredientesController::class)->names('admin.ingredientes');