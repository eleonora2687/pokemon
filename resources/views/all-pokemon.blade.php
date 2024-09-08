<x-layout>
    <div class="container-fluid m-1">
        <h1>This is a list of all Pokemon: </h1>
        <div class="col-md-12">
            @foreach ($pokemons as $pokemon)
                <x-pokemon-card :pokemon="$pokemon" :is_main_view="true" />
            @endforeach

            {{ $pokemons->links() }}
        </div>
    </div>
</x-layout>