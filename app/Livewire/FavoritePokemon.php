<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Pokemon;
use Illuminate\Support\Facades\DB;

class FavoritePokemon extends Component
{
    public $pokemon;
    public $is_favorite = false;

    public function mount(Pokemon $pokemon, $is_favorite)
    {
        $this->pokemon = $pokemon;
        $this->is_favorite = $is_favorite;
    }

    public function add()
    {
        Pokemon::where('id', $this->pokemon->id)->update(['is_favorite' => true]);
        $this->is_favorite = true;
        $this->pokemon->update(['is_favorite' => true]);
    }

    public function remove()
    {
        Pokemon::where('id', $this->pokemon->id)->update(['is_favorite' => false]);
        $this->is_favorite = false;
        $this->pokemon->update(['is_favorite' => false]);
    }

    public function render()
    {
        return view('livewire.favorite-pokemon');
    }
}
