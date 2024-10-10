<x-layout>
    <script src="{{ asset('search.js') }}"></script>

    <div class="container-fluid mt-1">
    <div class="d-flex justify-content-between align-items-center">
<!-- View favorites button for desktop -->
    <a href="{{ route('only-favorite-pokemon') }}" class="btn btn-primary d-none d-md-block mt-0">
        View your Favorites 
    </a>

    <!-- View favorites button for mobile -->
    <a href="{{ route('only-favorite-pokemon') }}" class="btn btn-primary d-block d-md-none mt-0 p-4">
        View Faves 
    </a>        
        <form class="d-none d-md-flex flex-column flex-md-row align-items-right mt-6 mt-md-1" role="search">
            <input class="form-control me-2 mb-0 mb-md-0" type="search" id="pokemon-search-desktop" placeholder="Search Pokémon.." aria-label="Search">
            <button class="btn btn-success" id="search-button-desktop" type="button">Search</button>
        </form>

        <div class="d-flex flex-column d-md-none mt-0">
            <input class="form-control mb-0" type="search" id="pokemon-search-mobile" placeholder="Search Pokémon.." aria-label="Search">
            <button class="btn btn-success" id="search-button-mobile" type="button">Search</button>
        </div>
        
    </div>
    
    <h2>This is a list of all Pokémon:</h2>

    <div class="col-md-12">
        @if ($pokemons->isEmpty())
          <h2>No Pokémon matches the results.</h2>
      @else
      

              @foreach ($pokemons as $pokemon)
                  <x-pokemon-card :pokemon="$pokemon" :is_main_view="true" />
              @endforeach
          
          {{ $pokemons->links() }} <!-- Pagination links -->
      @endif

        
    </div>
</div>
</x-layout>


