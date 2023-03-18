<?php

use App\Http\Controllers\CategoriasController;
use Illuminate\Support\Facades\Route;

Route::resource('categorias', CategoriasController::class)->names('admin.categorias');