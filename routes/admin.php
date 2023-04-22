<?php

use App\Http\Controllers\Admin\CategoriasController;
use App\Http\Controllers\Admin\IngredientesController;
use App\Http\Controllers\Admin\RecetaDetallesController;
use App\Http\Controllers\Admin\RecetaIndicacionesController;
use App\Http\Controllers\Admin\RecetasController;
use App\Http\Controllers\Admin\RecetaTiposController;
use App\Http\Controllers\Admin\RecetaUtensiliosController;
use App\Http\Controllers\Admin\UnidadMedidasController;
use App\Http\Controllers\Admin\UsersController;
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

Route::get('receta_indicaciones/{receta}',[RecetaIndicacionesController::class,'index'])->name('admin.receta_indicaciones.index');
Route::post('receta_indicaciones',[RecetaIndicacionesController::class,'store'])->name('admin.receta_indicaciones.store');
Route::get('receta_indicaciones/create/{receta}',[RecetaIndicacionesController::class,'create'])->name('admin.receta_indicaciones.create');
Route::get('receta_indicaciones/{receta_indicacion}/edit',[RecetaIndicacionesController::class,'edit'])->name('admin.receta_indicaciones.edit');
Route::delete('receta_indicaciones/{receta_indicacion}',[RecetaIndicacionesController::class,'destroy'])->name('admin.receta_indicaciones.destroy');
Route::put('receta_indicaciones/{receta_indicacion}',[RecetaIndicacionesController::class,'update'])->name('admin.receta_indicaciones.update');

Route::get('receta_utensilios/{receta}',[RecetaUtensiliosController::class,'index'])->name('admin.receta_utensilios.index');
Route::post('receta_utensilios',[RecetaUtensiliosController::class,'store'])->name('admin.receta_utensilios.store');
Route::get('receta_utensilios/create/{receta}',[RecetaUtensiliosController::class,'create'])->name('admin.receta_utensilios.create');
Route::get('receta_utensilios/{receta_utensilio}/edit',[RecetaUtensiliosController::class,'edit'])->name('admin.receta_utensilios.edit');
Route::delete('receta_utensilios/{receta_utensilio}',[RecetaUtensiliosController::class,'destroy'])->name('admin.receta_utensilios.destroy');
Route::put('receta_utensilios/{receta_utensilio}',[RecetaUtensiliosController::class,'update'])->name('admin.receta_utensilios.update');
//Route::resource('receta_detalles', RecetaUtensiliosController::class)->names('admin.receta_detalles');

Route::get('users/change_password',[UsersController::class,'edit'])->name('admin.users.change_password.edit');
Route::post('users/change_password',[UsersController::class,'update'])->name('admin.users.change_password.update');