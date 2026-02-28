<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
//    return view('welcome');
    return view('dashboard');
})->name('dashboard');

Route::resource('categories', CategoryController::class);
Route::resource('authors', AuthorController::class);
Route::resource('books', BookController::class);
