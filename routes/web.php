<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryTypeController;

Route::get('/category-types', [CategoryTypeController::class, 'create'])->name('category-types.create');
Route::post('/category-types', [CategoryTypeController::class, 'store'])->name('category-types.store');
