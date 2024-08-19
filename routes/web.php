<?php

use App\Http\Controllers\Admin\AttackController;
use App\Http\Controllers\Admin\PokemonController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/pokemon/{id}', [HomeController::class, 'pokemon'])->name('pokemon');

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::resource('pokemons', PokemonController::class);
    Route::resource('types', TypeController::class);
    Route::resource('attacks', AttackController::class);
});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
