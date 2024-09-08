@props(['pokemon'])
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
                    <div id="hpbar{{ $pokemon->id }}" class="progress col-md-12 mt-1" role="progressbar" aria-label="HP" aria-valuenow="{{ $pokemon->hp }}" aria-valuemin="0" aria-valuemax="100" style="height: 10px">
                        <div class="progress-bar" style="width: {{ $pokemon->hp }}%"></div>
                    </div>
                    <label for="hpbar">HP: {{ $pokemon->hp }}</label>
                    <br>
                    <div id="attackbar{{ $pokemon->id }}" class="progress col-md-12 mt-2" role="progressbar" aria-label="Attack" aria-valuenow="{{ $pokemon->attack }}" aria-valuemin="0" aria-valuemax="100" style="height: 10px">
                        <div class="progress-bar bg-danger" style="width: {{ $pokemon->attack }}%"></div>
                    </div>
                    <label for="attackbar">Attack: {{ $pokemon->attack }}</label>
                    <br>
                    <div id="defensebar{{ $pokemon->id }}" class="progress col-md-12 mt-2" role="progressbar" aria-label="Defense" aria-valuenow="{{ $pokemon->defense }}" aria-valuemin="0" aria-valuemax="100" style="height: 10px">
                        <div class="progress-bar bg-success" style="width: {{ $pokemon->defense }}%"></div>
                    </div>
                    <label for="defensebar">Defense: {{ $pokemon->defense }}</label>
                    <br>
                    <div id="spattackbar{{ $pokemon->id }}" class="progress col-md-12 mt-2" role="progressbar" aria-label="Defense" aria-valuenow="{{ $pokemon->sp_attack }}" aria-valuemin="0" aria-valuemax="100" style="height: 10px">
                        <div class="progress-bar bg-info" style="width: {{ $pokemon->sp_attack }}%"></div>
                    </div>
                    <label for="spattackbar">Special Attack: {{ $pokemon->sp_attack }}</label>
                    <br>
                    <div id="spdefensebar{{ $pokemon->id }}" class="progress col-md-12 mt-2" role="progressbar" aria-label="Defense" aria-valuenow="{{ $pokemon->sp_defense }}" aria-valuemin="0" aria-valuemax="100" style="height: 10px">
                        <div class="progress-bar bg-warning" style="width: {{ $pokemon->sp_defense }}%"></div>
                    </div>
                    <label for="spdefensebar">Special Defense: {{ $pokemon->sp_defense }}</label>
                    <br>
                    <div id="speedbar{{ $pokemon->id }}" class="progress col-md-12 mt-2" role="progressbar" aria-label="Defense" aria-valuenow="{{ $pokemon->speed }}" aria-valuemin="0" aria-valuemax="100" style="height: 10px">
                        <div class="progress-bar bg-light" style="width: {{ $pokemon->speed }}%"></div>
                    </div>
                    <label for="speedbar">Speed: {{ $pokemon->speed }}</label>
                    <div class="m-3">
                        <p class="card-text">Height: {{ $pokemon->height }} m</p>
                        <p class="card-text">Weight: {{ $pokemon->weight }} kg</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>