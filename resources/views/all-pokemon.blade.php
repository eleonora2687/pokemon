<x-layout>
    <div class="container-fluid m-1">
        <h1>This is a list of all Pokemon: </h1>
        <div class="col-md-12">
            @foreach ($pokemons as $pokemon)
            <div class="col-md-12 rounded-1 m-3">
                <div class="card">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <h5 class="card-title m-2">{{ $pokemon->name }}</h5>
                            <img src="{{ $pokemon->image }}" class="img-fluid rounded mx-auto d-block bg-light" alt="{{ $pokemon->name }}">
                            <br>
                            <label for="types" class="list-label m-1">Types</label>
                            <ul id="types{{$pokemon->id}}" class="list-group list-group-flush">
                                @foreach (json_decode($pokemon->types) as $type)
                                    <li class="list-group-item">{{ $type->type->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <p>HP: {{ $pokemon->hp }}</p>
                                <p>Attack: {{ $pokemon->attack }}</p>
                                <p>Defense: {{ $pokemon->defense }}</p>
                                <p>Special Attack: {{ $pokemon->sp_attack }}</p>
                                <p>Special Defense: {{ $pokemon->sp_defense }}</p>
                                <p>Speed: {{ $pokemon->speed }}</p>
                                <div class="m-3">
                                    <p class="card-text">Height: {{ $pokemon->height }} m</p>
                                    <p class="card-text">Weight: {{ $pokemon->weight }} kg</p>
                                </div>
            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            {{ $pokemons->links() }}
        </div>
    </div>
</x-layout>