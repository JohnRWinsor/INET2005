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
Route::delete('/categories/{category}', 'CategoryController@destroy')->name('categories.destroy');
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');


// Items
Route::get('/items', [ItemController::class, 'index']);
Route::get('/items/create', [ItemController::class, 'create']);
Route::post('/items', [ItemController::class, 'store']);
Route::get('/items/{id}/edit', [ItemController::class, 'edit']);
Route::patch('/items/{id}', [ItemController::class, 'update']);
Route::get('/items/{id}/delete', [ItemController::class, 'confirmDelete']);
Route::delete('/items/{id}', [ItemController::class, 'destroy'])->name('items.destroy');;
Route::get('/items/{id}/edit', [ItemController::class, 'edit'])->name('items.edit');



