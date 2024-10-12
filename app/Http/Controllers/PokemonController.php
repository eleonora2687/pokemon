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

        // Fetch the Pokémon with the maximum HP
        $maxHPPokemon = Pokemon::orderByDesc('hp')->first();
        
                // Log the maxHPPokemon and also if there is no result
        if ($maxHPPokemon) {
            \Log::info('Max HP Pokémon found: ' . $maxHPPokemon->name . ' with HP: ' . $maxHPPokemon->hp);
        } else {
            \Log::info('No Pokémon found with HP.');
        }

        $maxAttack = Pokemon::orderByDesc('attack')->first();
        // Log the maxAttack Pokémon and also if there is no result
        if ($maxAttack) {
            \Log::info('Max Attack Pokémon found: ' . $maxAttack->name . ' with Attack: ' . $maxAttack->attack);
        } else {
            \Log::info('No Pokémon found with Attack.');
        }

        $maxDefense = Pokemon::orderByDesc('defense')->first();
        // Log the maxAttack Pokémon and also if there is no result
        if ($maxDefense) {
            \Log::info('Max Defense Pokémon found: ' . $maxDefense->name . ' with Defense: ' . $maxDefense->defense);
        } else {
            \Log::info('No Pokémon found with Defense.');
        }

        $maxSPAttack = Pokemon::orderByDesc('sp_attack')->first();
        // Log the maxAttack Pokémon and also if there is no result
        if ($maxSPAttack) {
            \Log::info('Max special Attack Pokémon found: ' . $maxSPAttack->name . ' with special Attack: ' . $maxSPAttack->sp_attack);
        } else {
            \Log::info('No Pokémon found with Special Attack.');
        }

        
        $maxSPDefense = Pokemon::orderByDesc('sp_defense')->first();
        // Log the maxAttack Pokémon and also if there is no result
        if ($maxSPDefense) {
            \Log::info('Max special Defense Pokémon found: ' . $maxSPDefense->name . ' with special Defense: ' . $maxSPDefense->sp_defense);
        } else {
            \Log::info('No Pokémon found with Special Defense.');
        }

        
        $maxSpeed = Pokemon::orderByDesc('speed')->first();
        // Log the maxAttack Pokémon and also if there is no result
        if ($maxSpeed) {
            \Log::info('Max Speed Pokémon found: ' . $maxSpeed->name . ' with Speed: ' . $maxSpeed->speed);
        } else {
            \Log::info('No Pokémon found with Speed.');
        }

        return view('all-pokemon', ['pokemons' => $pokemon, 'maxHPPokemon' => $maxHPPokemon, 'maxAttack' => $maxAttack, 'maxDefense' => $maxDefense, 'maxSPAttack' => $maxSPAttack, 'maxSPDefense' => $maxSPDefense, 'maxSpeed' => $maxSpeed]);
    }


    public function getAllFavoritePokemon()
    {
        // Fetch the favorite Pokémon
        $pokemon = Pokemon::where('is_favorite', true)->orderBy('name')->paginate(20);
            
        // Fetch the Pokémon with the maximum HP
        $maxHPPokemon = Pokemon::orderByDesc('hp')->first();

        // Optionally, you can also fetch the max attack Pokémon
        $maxAttack = Pokemon::orderByDesc('attack')->first();
        $maxDefense = Pokemon::orderByDesc('defense')->first();
        $maxSPAttack = Pokemon::orderByDesc('sp_attack')->first();
        $maxSPDefense = Pokemon::orderByDesc('sp_attack')->first();
        $maxSpeed = Pokemon::orderByDesc('speed')->first();


        // Pass the variables to the view
        return view('all-favorite-pokemon', [
            'pokemons' => $pokemon,
            'maxHPPokemon' => $maxHPPokemon,
            'maxAttack' => $maxAttack,
            'maxDefense' => $maxDefense,
            'maxSPAttack' => $maxSPAttack,
            'maxSPDefense' => $maxSPDefense,
            'maxSpeed' => $maxSpeed,
        ]);
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
       // Retrieve the Pokémon by name
$pokemon = Pokemon::where('name', $name)->first();

// Retrieve the Pokémon with maximum HP
$maxHPPokemon = Pokemon::orderByDesc('hp')->first();

// Retrieve the Pokémon with maximum attack
$maxAttack = Pokemon::orderByDesc('attack')->first();

// Retrieve the Pokémon with maximum defense
$maxDefense = Pokemon::orderByDesc('defense')->first();

// Retrieve the Pokémon with maximum special attack
$maxSPAttack = Pokemon::orderByDesc('sp_attack')->first();

// Retrieve the Pokémon with maximum special defense
$maxSPDefense = Pokemon::orderByDesc('sp_defense')->first(); // Corrected from sp_attack to sp_defense

// Retrieve the Pokémon with maximum speed
$maxSpeed = Pokemon::orderByDesc('speed')->first();

// Pass the variables to the view
return view('single-pokemon', [
    'pokemon' => $pokemon, // Changed from 'pokemons' to 'pokemon'
    'maxHPPokemon' => $maxHPPokemon,
    'maxAttack' => $maxAttack,
    'maxDefense' => $maxDefense,
    'maxSPAttack' => $maxSPAttack,
    'maxSPDefense' => $maxSPDefense,
    'maxSpeed' => $maxSpeed,
]);


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
    $maxHPPokemon = Pokemon::orderByDesc('hp')->first();
    $maxAttack = Pokemon::orderByDesc('attack')->first();
    $maxDefense = Pokemon::orderByDesc('defense')->first();
    $maxSPAttack = Pokemon::orderByDesc('sp_attack')->first();
    $maxSPDefense = Pokemon::orderByDesc('sp_defense')->first(); // Corrected from sp_attack to sp_defense
    $maxSpeed = Pokemon::orderByDesc('speed')->first();

    
    // Pass the variables to the view using compact
    return view('search-pokemon', compact('pokemons', 'query', 'maxHPPokemon', 'maxAttack', 'maxDefense', 'maxSPAttack', 'maxSPDefense', 'maxSpeed'));
}



}
