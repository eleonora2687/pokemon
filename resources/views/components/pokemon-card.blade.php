@props(['pokemon', 'is_main_view'])
<link href="{{ asset('css/custom-styles.css') }}" rel="stylesheet">
<div class="col-md-12 rounded-1 m-2">

    <div class="card bg-light-pink mb-3"> 
        <div class="row g-0">

            <div class="col-md-4">
                <h4 class="card-title m-2">{{ $pokemon->name }}</h4>
                <img src="{{ $pokemon->image }}" class="img-fluid rounded mx-auto d-block bg-light" alt="{{ $pokemon->name }}">
                <br>
                <label for="types" class="list-label m-1">Types:</label>
                @php
                    $types = json_decode($pokemon->types);
                    $typeNames = collect($types)->pluck('type.name')->implode(', ');
                @endphp
                <span class="m-0">{{ $typeNames }}</span>
            </div>
            
            
            <div class="col-md-8">
                <div class="card-body">
                    <div id="hpbar{{ $pokemon->id }}" class="progress col-md-12 mt-1" role="progressbar" aria-label="HP" aria-valuenow="{{ $pokemon->hp }}" aria-valuemin="0" aria-valuemax="100" style="height: 10px">
                        <div class="progress-bar progress-bar-striped" style="width: {{ $pokemon->hp }}%"></div>
                    </div>
                    <label for="hpbar">HP: {{ $pokemon->hp }}</label>
                    <br>
                    <div id="attackbar{{ $pokemon->id }}" class="progress col-md-12 mt-2" role="progressbar" aria-label="Attack" aria-valuenow="{{ $pokemon->attack }}" aria-valuemin="0" aria-valuemax="100" style="height: 10px">
                        <div class="progress-bar progress-bar-striped bg-danger" style="width: {{ $pokemon->attack }}%"></div>
                    </div>
                    <label for="attackbar">Attack: {{ $pokemon->attack }}</label>
                    <br>
                    <div id="defensebar{{ $pokemon->id }}" class="progress col-md-12 mt-2" role="progressbar" aria-label="Defense" aria-valuenow="{{ $pokemon->defense }}" aria-valuemin="0" aria-valuemax="100" style="height: 10px">
                        <div class="progress-bar progress-bar-striped bg-success" style="width: {{ $pokemon->defense }}%"></div>
                    </div>
                    <label for="defensebar">Defense: {{ $pokemon->defense }}</label>
                    <br>
                    <div id="spattackbar{{ $pokemon->id }}" class="progress col-md-12 mt-2" role="progressbar" aria-label="Defense" aria-valuenow="{{ $pokemon->sp_attack }}" aria-valuemin="0" aria-valuemax="100" style="height: 10px">
                        <div class="progress-bar progress-bar-striped bg-info" style="width: {{ $pokemon->sp_attack }}%"></div>
                    </div>
                    <label for="spattackbar">Special Attack: {{ $pokemon->sp_attack }}</label>
                    <br>
                    <div id="spdefensebar{{ $pokemon->id }}" class="progress col-md-12 mt-2" role="progressbar" aria-label="Defense" aria-valuenow="{{ $pokemon->sp_defense }}" aria-valuemin="0" aria-valuemax="100" style="height: 10px">
                        <div class="progress-bar progress-bar-striped bg-warning" style="width: {{ $pokemon->sp_defense }}%"></div>
                    </div>
                    <label for="spdefensebar">Special Defense: {{ $pokemon->sp_defense }}</label>
                    <br>
                    <div id="speedbar{{ $pokemon->id }}" class="progress col-md-12 mt-2" role="progressbar" aria-label="Defense" aria-valuenow="{{ $pokemon->speed }}" aria-valuemin="0" aria-valuemax="100" style="height: 10px">
                        <div class="progress-bar progress-bar-striped bg-dark" style="width: {{ $pokemon->speed }}%"></div>
                    </div>
                    <label for="speedbar">Speed: {{ $pokemon->speed }}</label>
                    <div class="m-2">
                        <ul>
                            <li>Height: {{ $pokemon->height }} m</li>
                            <li>Weight: {{ $pokemon->weight }} kg</li>
                        </ul>
                    </div>

                    @if ($is_main_view)
                        @livewire('favorite-pokemon', ['pokemon'=>$pokemon, 'is_favorite'=> $pokemon->is_favorite])
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
