<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class PokemonController extends Controller
{
    protected $pokeApiClient;

    public function __construct(Client $pokeApiClient)
    {
        $this->pokeApiClient = $pokeApiClient;
    }

    /**
     * Display a listing of all Pokémon.
    */
    public function getAllPokemon()
    {
        $pokemon = Pokemon::orderByDesc('weight')->paginate(20);
        return view('all-pokemon', ['pokemons' => $pokemon]);
    }

    public function getAllFavoritePokemon()
    {
        $pokemon = Pokemon::where('is_favorite', true)->orderBy('name')->paginate(20);
        return view('all-favorite-pokemon', ['pokemons' => $pokemon]);
    }

    public function getPokemonFromAPI(string $name)
    {
        try {
            $response = $this->pokeApiClient->get("pokemon/$name");
            $pokemon = json_decode($response->getBody()->getContents());

            return $pokemon;
        } catch (\Exception $e) {
            // Handle errors
            return response()->json(['error' => 'Pokemon not found'], 404);
        }
    }

    public function getPokemonFromDB($name)
    {
        $pokemon = Pokemon::where('name', $name)->first();

        return view('single-pokemon', ['pokemon' => $pokemon]);
    }

}
