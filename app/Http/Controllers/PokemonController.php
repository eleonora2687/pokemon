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

    public function addToFavorites(Pokemon $pokemon)
    {
        // Update the Pokémon's is_favorite attribute
        $pokemon->is_favorite = true;
        $pokemon->save();

        return response()->json(['message' => 'Pokemon added to favorites']);
    }

    public function removeFromFavorites(Pokemon $pokemon)
    {
        // Update the Pokémon's is_favorite attribute
        $pokemon->is_favorite = false;
        $pokemon->save();

        return response()->json(['message' => 'Pokemon removed from favorites']);
    }

    public function searchPokemon(Request $request)
{
    $query = $request->input('query');

    // Validate the query to prevent unnecessary errors
    if (empty($query)) {
        return redirect()->back()->with('error', 'Search query cannot be empty');
    }

    // Find Pokémon whose names start with the search query, and paginate results
    $pokemons = Pokemon::where('name', 'like', $query . '%')->paginate(20);

    // Pass the query to the view for display
    return view('search-pokemon', compact('pokemons', 'query'));
}





}
