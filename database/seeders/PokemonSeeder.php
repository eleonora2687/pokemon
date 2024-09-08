<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Pokemon;
use GuzzleHttp\Client;

class PokemonSeeder extends Seeder
{
    protected $pokeApiClient;

    public function __construct(Client $pokeApiClient)
    {
        $this->pokeApiClient = $pokeApiClient;
    }
    
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $allPokemon = [];
        $this->fetchPokemon(0, $allPokemon);
    }

    private function fetchPokemon(int $offset, array &$allPokemon)
    {
        try {
            $response = $this->pokeApiClient->get("pokemon?limit=1500&offset=$offset");
            $data = json_decode($response->getBody()->getContents(), true);
    
            // Store Pokémon data in the database
            foreach ($data['results'] as $pokemonData) {
                $speed = 0;
                $sp_defense = 0;
                $sp_attack = 0;
                $defense = 0;
                $attack = 0;
                $hp = 0;
                $pokemon = $this->getPokemon($pokemonData['name']);
                $new_pokemon = Pokemon::create(['name' => $pokemon->name]);
                
                foreach($pokemon->stats as $stat) {
                    if ($stat->stat->name == 'hp')
                        $hp = $stat->base_stat;
                    else if ($stat->stat->name == 'speed')
                        $speed = $stat->base_stat;
                    else if ($stat->stat->name == 'special-defense')
                        $sp_defense = $stat->base_stat;
                    else if ($stat->stat->name == 'special-attack')
                        $sp_attack = $stat->base_stat;
                    else if ($stat->stat->name == 'attack')
                        $attack = $stat->base_stat;
                    else if ($stat->stat->name == 'defense')
                        $defense = $stat->base_stat;
                }

                // Update existing Pokémon data
                $new_pokemon->update([
                    'weight' => $pokemon->weight/10,
                    'height' => $pokemon->height/10,
                    'image' => $pokemon->sprites->front_default,
                    'types' => json_encode($pokemon->types),
                    'speed' => $speed,
                    'sp_defense' => $sp_defense,
                    'sp_attack' => $sp_attack,
                    'defense' => $defense,
                    'attack' => $attack,
                    'hp' => $hp,
                    'is_favorite' => false,
                ]);
            }
    
        } catch (\Exception $e) {
            // Handle errors
            dd($e->getMessage());
        }
    }

    public function getPokemon(string $name)
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
}
