<x-layout>
    <script src="{{ asset('search.js') }}"></script>

    <div class="container-fluid mt-1">
        <div class="row justify-content-between align-items-center">
            
            <div class="col-6 col-md-auto">
                <a href="{{ route('only-favorite-pokemon') }}" class="btn btn-primary mt-2 mt-md-1">
                    View your Favorites
                </a>
            </div>

            <div class="col-6 col-md-auto d-none d-md-block">
                <form class="d-flex flex-row align-items-right mt-1 mt-md-0" role="search">
                    <input class="form-control me-1" type="search" id="pokemon-search-desktop" placeholder="Search Pokémon.." aria-label="Search">
                    <button class="btn btn-success" id="search-button-desktop" type="button">Search</button>
                </form>
            </div>
        </div>

        
        <div class="row mt-2 d-md-none">
            <div class="col-8">
                <input class="form-control" type="search" id="pokemon-search-mobile" placeholder="Search Pokémon.." aria-label="Search">
            </div>
            <div class="col-4">
                <button class="btn btn-success w-100" id="search-button-mobile" type="button">Search</button>
            </div>
        </div>

        <div class="col-12 mt-3">
            <h2 class="text-center">This is a list of all Pokémon:</h2>
        </div>

        <div class="col-md-12">
            @if ($pokemons->isEmpty())
                <h2>No Pokémon matches the results.</h2>
            @else
                @foreach ($pokemons as $pokemon)
                    <x-pokemon-card :pokemon="$pokemon" :is_main_view="true" />
                @endforeach
                {{ $pokemons->links() }} 
            @endif
        </div>
    </div>
</x-layout>
