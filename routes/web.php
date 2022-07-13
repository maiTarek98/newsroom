<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\Website\HomeController::class, 'index']);
Route::get('/category', [App\Http\Controllers\Website\HomeController::class, 'category']);
Route::get('/blogs/{category}', [App\Http\Controllers\Website\HomeController::class, 'blogs']);
Route::get('/blog/{slug}',[App\Http\Controllers\Website\HomeController::class, 'single_blog']);
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



