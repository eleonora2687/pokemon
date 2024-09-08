<x-layout>
    <div class="container-fluid m-1">
        <a href={{ route('only-favorite-pokemon')}} class="btn btn-primary mt-1">View your favorites</a>
        <h1>This is a list of all Pokemon: </h1>
        <div class="col-md-12">
            @foreach ($pokemons as $pokemon)
                <x-pokemon-card :pokemon="$pokemon" :is_main_view="true" />
            @endforeach

            {{ $pokemons->links() }}
        </div>
    </div>
</x-layout>