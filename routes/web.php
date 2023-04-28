<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\mediaController;
use App\Http\Controllers\pagesController;
use App\Http\Controllers\postsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'getHome']);

Route::get('/features', [pagesController::class, 'features']);
Route::get('/about', [pagesController::class, 'about']);

Route::prefix('posts')->group(function () {
    Route::controller(postsController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/create', 'create');
        Route::post('/create', 'store');
        Route::get('/{id}', 'show');
        Route::get('/{id}/edit', 'edit');
        Route::put('/{id}/update', 'update');
        Route::delete('/{id}/delete', 'destroy');
    });
});

Route::prefix('media')->group(function () {
    Route::controller(mediaController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/upload', 'create');
        Route::post('/create', 'store');
        Route::get('/{id}', 'show');
        Route::delete('/{id}/delete', 'destroy');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
