<?php

use Illuminate\Support\Facades\Route;
use App\Models\Pokemon;
use App\Http\Controllers\PokemonController;
// use App\Http\Controllers\SearchController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/all-pokemon', [PokemonController::class, 'getAllPokemon'])->name('all-pokemon');

Route::get('/favorite-pokemon', [PokemonController::class, 'getAllFavoritePokemon'])->name('only-favorite-pokemon');

Route::get('/pokemon/{name}', [PokemonController::class, 'getPokemonFromDB'])->name('single-pokemon');

Route::post('/pokemon/{pokemon}/favorite', [PokemonController::class, 'addToFavorites'])->name('pokemon.favorite');

Route::post('/pokemon/{pokemon}/remove_favorite', [PokemonController::class, 'removeFromFavorites'])->name('pokemon.remove_favorite');

Route::get('/search-pokemon', [PokemonController::class, 'searchPokemon'])->name('search.pokemon');
