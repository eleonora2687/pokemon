<x-layout>
    <div class="container-fluid m-1">
        <a href={{ route('all-pokemon')}} class="btn btn-primary mt-1">Back to All Pokemon</a>
        <h1>This is a list of your favorite Pokemon: </h1>
        <div class="col-md-12">
            @foreach ($pokemons as $pokemon)
                <x-pokemon-card :pokemon="$pokemon" :is_main_view="false" />
            @endforeach

            {{ $pokemons->links() }}
        </div>
    </div>
</x-layout>