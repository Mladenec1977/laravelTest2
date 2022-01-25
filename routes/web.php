<?php

use App\Http\Controllers\FilmController;
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

Route::get('/', [App\Http\Controllers\FilmController::class, 'index'])
    ->name('home');

Route::get('/genre/{genre_id}', [App\Http\Controllers\FilmController::class, 'homeGenre'])
    ->name('homeGenre');

Route::post('/photo/{film_id}', [App\Http\Controllers\FilmController::class, 'addPhoto'])
    ->name('addPhoto');

Route::get('/photo/{film_id}', [App\Http\Controllers\FilmController::class, 'getPhoto'])
    ->name('getPhoto');

Route::get('/search', [App\Http\Controllers\FilmController::class, 'searchFilms'])
    ->name('searchFilms');

Route::resource('films', FilmController::class);
