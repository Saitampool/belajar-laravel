<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

// Menggunakan Arror Function

// Route::get('/', fn() => view('home'));
// Route::get('/about', fn() => view('about'));
// Route::get('/contact', fn() => view('contact'));
// Route::get('/gallery', fn() => view('gallery'));

// Menggunakan Controller
Route::get('/', Controllers\HomeController::class);
Route::get('/about', [Controllers\AboutController::class, 'index']);
Route::get('/contact', [Controllers\ContactController::class, 'index']);
Route::get('/gallery', [Controllers\GalleryController::class, 'index']);
Route::get('/users', [Controllers\UserController::class, 'index']);
Route::get('/users/create', [Controllers\UserController::class, 'create']);
Route::post('/users', [Controllers\UserController::class, 'store']);
