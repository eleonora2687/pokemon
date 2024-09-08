<?php

use Illuminate\Support\Facades\Route;
use App\Models\Pokemon;
use App\Http\Controllers\PokemonController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/all-pokemon', [PokemonController::class, 'getAllPokemon'])->name('all-pokemon');
Route::get('/pokemon/{name}', [PokemonController::class, 'getPokemonFromDB'])->name('single-pokemon');
