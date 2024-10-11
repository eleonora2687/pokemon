<div class="mt-1">
    @if (!$this->is_favorite)  
        <button class="btn btn-info" wire:click="add('{{ $this->pokemon->id }}')">Add to Favorites</button>
    @else
        {{-- <p class="card-text">This pokemon is one of your favorites!</p> --}}
        <button class="btn btn-warning" wire:click="remove('{{ $this->pokemon->id }}')">Remove From Favorites</button>
    @endif
</div>
