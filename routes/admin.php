<?php

use App\Http\Controllers\Admin\CategoriasController;
use App\Http\Controllers\Admin\IngredientesController;
use App\Http\Controllers\Admin\RecetaDetallesController;
use App\Http\Controllers\Admin\RecetasController;
use App\Http\Controllers\Admin\RecetaTiposController;
use App\Http\Controllers\Admin\UnidadMedidasController;
use App\Http\Controllers\Admin\UtensiliosController;
use Illuminate\Support\Facades\Route;

Route::resource('categorias', CategoriasController::class)->names('admin.categorias');
Route::resource('ingredientes', IngredientesController::class)->names('admin.ingredientes');
Route::resource('receta_tipos', RecetaTiposController::class)->names('admin.receta_tipos');
Route::resource('utensilios', UtensiliosController::class)->names('admin.utensilios');
Route::resource('unidad_medidas', UnidadMedidasController::class)->names('admin.unidad_medidas');
Route::resource('recetas', RecetasController::class)->names('admin.recetas');

Route::get('receta_detalles/{receta}',[RecetaDetallesController::class,'index'])->name('admin.receta_detalles.index');
Route::post('receta_detalles',[RecetaDetallesController::class,'store'])->name('admin.receta_detalles.store');
Route::get('receta_detalles/create/{receta}',[RecetaDetallesController::class,'create'])->name('admin.receta_detalles.create');
Route::get('receta_detalles/{receta_detalle}/edit',[RecetaDetallesController::class,'edit'])->name('admin.receta_detalles.edit');
Route::delete('receta_detalles/{receta_detalle}',[RecetaDetallesController::class,'destroy'])->name('admin.receta_detalles.destroy');
Route::put('receta_detalles/{receta_detalle}',[RecetaDetallesController::class,'update'])->name('admin.receta_detalles.update');
//Route::resource('receta_detalles', RecetaDetallesController::class)->names('admin.receta_detalles');