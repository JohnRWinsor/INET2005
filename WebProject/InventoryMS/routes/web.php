<?php

use Illuminate\Support\Facades\Route;

// routes/web.php
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;

Route::get('/categories/create', [CategoryController::class, 'create']);
Route::post('/categories', [CategoryController::class, 'store']);
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{id}/edit', [CategoryController::class, 'edit']);
Route::patch('/categories/{id}', [CategoryController::class, 'update']);

Route::get('/items/create', [ItemController::class, 'create']);
Route::post('/items', [ItemController::class, 'store']);
Route::get('/items', [ItemController::class, 'index']);
Route::get('/items/{id}/edit', [ItemController::class, 'edit']);
Route::patch('/items/{id}', [ItemController::class, 'update']);
Route::delete('/items/{id}', [ItemController::class, 'destroy']);


Route::get('/', function () {
    return view('welcome');
});
