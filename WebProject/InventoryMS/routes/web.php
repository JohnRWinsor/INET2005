<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Categories
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::patch('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
Route::get('/categories/{id}/confirm-delete', [CategoryController::class, 'confirmDelete'])->name('categories.confirm-delete');




// Items
Route::get('/items/create', [ItemController::class, 'create'])->name('items.create');
Route::post('/items', [ItemController::class, 'store'])->name('items.store');
Route::get('/items', [ItemController::class, 'index'])->name('items.index');
Route::get('/items/{id}/edit', [ItemController::class, 'edit'])->name('items.edit');
Route::patch('/items/{id}', [ItemController::class, 'update'])->name('items.update');
Route::get('/items/{id}/confirm-delete', [ItemController::class, 'confirmDelete'])->name('items.confirm-delete');
Route::delete('/items/{id}', [ItemController::class, 'destroy'])->name('items.destroy');
