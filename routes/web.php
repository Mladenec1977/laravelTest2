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
    ->name('filmsList');

Route::get('/genre/{genre_id}', [App\Http\Controllers\FilmController::class, 'homeGenre'])
    ->name('homeGenre');

Route::get('/search', [App\Http\Controllers\FilmController::class, 'searchFilms'])
    ->name('searchFilms');

Route::post('/photo/{films_id}', [App\Http\Controllers\FilmController::class, 'addPhoto'])
    ->name('addPhoto');

Route::get('/photo/{films_id}', [App\Http\Controllers\FilmController::class, 'getPhoto'])
    ->name('getPhoto');

Route::resources([
    'films' => FilmController::class
]);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
