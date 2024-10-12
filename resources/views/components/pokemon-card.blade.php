@props(['pokemon', 'is_main_view', 'maxHPPokemon', 'maxAttack', 'maxDefense', 'maxSPAttack', 'maxSPDefense', 'maxSpeed'])
<link href="{{ asset('css/custom-styles.css') }}" rel="stylesheet">
<div class="col-md-12 rounded-1 m-2">
    <div class="card bg-light-pink mb-3"> 
        <div class="row g-0">
            <div class="col-md-4">
                <h4 class="card-title m-2">{{ ucfirst($pokemon->name) }}</h4>
                <img src="{{ $pokemon->image }}" class="img-fluid rounded mx-auto d-block bg-light" alt="{{ $pokemon->name }}">
                <br>
                <label for="types" class="list-label m-2">Types:</label>
                @php
                    $types = json_decode($pokemon->types);
                    $typeNames = collect($types)->pluck('type.name')->implode(', ');
                @endphp
                <span class="m-0">{{ $typeNames }}</span>
            </div>
            
            <div class="col-md-8">
                <div class="card-body">
                    @php
                        // Ensure max values are numeric
                        $maxHPValue = $maxHPPokemon ? $maxHPPokemon->hp : 0; // Set to 0 if no max found
                        $maxAttackValue = $maxAttack ? $maxAttack->attack : 0;
                        $maxDefenseValue = $maxDefense ? $maxDefense->defense : 0;
                        $maxSPAttackValue = $maxSPAttack ? $maxSPAttack->sp_attack : 0;
                        $maxSPDefenseValue = $maxSPDefense ? $maxSPDefense->sp_defense : 0;
                        $maxSpeedValue = $maxSpeed ? $maxSpeed->speed : 0;

                        // Calculate percentage values
                        $hpPercentage = $maxHPValue > 0 ? ($pokemon->hp / $maxHPValue) * 100 : 0; // HP percentage
                        $attackPercentage = $maxAttackValue > 0 ? ($pokemon->attack / $maxAttackValue) * 100 : 0; // Attack percentage
                        $defensePercentage = $maxDefenseValue > 0 ? ($pokemon->defense / $maxDefenseValue) * 100 : 0; // Defense percentage
                        $spAttackPercentage = $maxSPAttackValue > 0 ? ($pokemon->sp_attack / $maxSPAttackValue) * 100 : 0; // Special Attack percentage
                        $spDefensePercentage = $maxSPDefenseValue > 0 ? ($pokemon->sp_defense / $maxSPDefenseValue) * 100 : 0; // Special Defense percentage
                        $speedPercentage = $maxSpeedValue > 0 ? ($pokemon->speed / $maxSpeedValue) * 100 : 0; // Speed percentage
                    @endphp

                    <div class="progress col-md-12 mt-1" role="progressbar" aria-label="HP" aria-valuenow="{{ $hpPercentage }}" aria-valuemin="0" aria-valuemax="100" style="height: 10px">
                        <div class="progress-bar progress-bar-striped" style="width: {{ $hpPercentage }}%"></div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-1">
                        <label for="hpbar" class="m-0">HP: {{ $pokemon->hp }}</label>
                        <div class="text-end">
                            @if (isset($maxHPPokemon) && is_object($maxHPPokemon))
                                <p class="m-0">Max HP: {{ $maxHPPokemon->hp }}</p>
                            @else
                                <p class="m-0">No Max HP Pokémon found.</p>
                            @endif
                        </div>
                    </div>

                    <br>

                    <div class="progress col-md-12 mt-1" role="progressbar" aria-label="Attack" aria-valuenow="{{ $attackPercentage }}" aria-valuemin="0" aria-valuemax="100" style="height: 10px">
                        <div class="progress-bar progress-bar-striped bg-success" style="width: {{ $attackPercentage }}%"></div>
                    </div>
                        <div class="d-flex justify-content-between align-items-center mt-1">
                            <label for="attackbar" class="m-0">Attack: {{ $pokemon->attack }}</label>
                            <div class="text-end">
                                @if (isset($maxAttack) && is_object($maxAttack)) 
                                    <p class="m-0">Max Attack: {{ $maxAttack->attack }}</p>
                                @else
                                    <p class="m-0">No Max Attack Pokémon found.</p> 
                                @endif
                            </div>
                        </div>


                    <br>

                    <div class="progress col-md-12 mt-1" role="progressbar" aria-label="Defense" aria-valuenow="{{ $defensePercentage }}" aria-valuemin="0" aria-valuemax="100" style="height: 10px">
                        <div class="progress-bar progress-bar-striped bg-danger" style="width: {{ $defensePercentage }}%"></div>
                    </div>
                        <div class="d-flex justify-content-between align-items-center mt-1">
                            <label for="defensebar" class="m-0">Defense: {{ $pokemon->defense }}</label>
                            <div class="text-end">
                                @if (isset($maxDefense) && is_object($maxDefense)) 
                                    <p class="m-0">Max Defense: {{ $maxDefense->defense }}</p>
                                @else
                                    <p class="m-0">No Max Defense Pokémon found.</p> 
                                @endif
                            </div>
                        </div>

                    <br>

                    <div class="progress col-md-12 mt-1" role="progressbar" aria-label="Special Attack" aria-valuenow="{{ $spAttackPercentage }}" aria-valuemin="0" aria-valuemax="100" style="height: 10px">
                        <div class="progress-bar progress-bar-striped bg-warning" style="width: {{ $spAttackPercentage }}%"></div>
                    </div>
                        <div class="d-flex justify-content-between align-items-center mt-1">
                            <label for="spattackbar" class="m-0">Special Attack: {{ $pokemon->sp_attack}}</label>
                            <div class="text-end">
                                @if (isset($maxSPAttack) && is_object($maxSPAttack)) 
                                    <p class="m-0">Max Special Attack: {{ $maxSPAttack->sp_attack }}</p>
                                @else
                                    <p class="m-0">No Special Attack Pokémon found.</p> 
                                @endif
                            </div>
                        </div>

                    <br>

                    <div class="progress col-md-12 mt-1" role="progressbar" aria-label="Special Defense" aria-valuenow="{{ $spDefensePercentage }}" aria-valuemin="0" aria-valuemax="100" style="height: 10px">
                        <div class="progress-bar progress-bar-striped bg-info" style="width: {{ $spDefensePercentage }}%"></div>
                    </div>
                        <div class="d-flex justify-content-between align-items-center mt-1">
                            <label for="spdefensebar" class="m-0">Special Defense: {{ $pokemon->sp_defense}}</label>
                            <div class="text-end">
                                @if (isset($maxSPDefense) && is_object($maxSPDefense)) 
                                    <p class="m-0">Max Special Defense: {{ $maxSPDefense->sp_defense }}</p>
                                @else
                                    <p class="m-0">No Special Defense Pokémon found.</p> 
                                @endif
                            </div>
                        </div>
                    <br>
                    <div class="progress col-md-12 mt-1" role="progressbar" aria-label="Speed" aria-valuenow="{{ $speedPercentage }}" aria-valuemin="0" aria-valuemax="100" style="height: 10px">
                        <div class="progress-bar progress-bar-striped bg-dark" style="width: {{ $speedPercentage }}%"></div>
                    </div>
                        <div class="d-flex justify-content-between align-items-center mt-1">
                            <label for="speedbar" class="m-0">Speed: {{ $pokemon->speed}}</label>
                            <div class="text-end">
                                @if (isset($maxSpeed) && is_object($maxSpeed)) 
                                    <p class="m-0">Max Speed: {{ $maxSpeed->speed }}</p>
                                @else
                                    <p class="m-0">No Speed Pokémon found.</p> 
                                @endif
                            </div>
                        </div>
                    <div class="m-2">
                        <ul>
                            <li>Height: {{ $pokemon->height }} m</li>
                            <li>Weight: {{ $pokemon->weight }} kg</li>
                        </ul>
                    </div>

                    @if ($is_main_view)
                        @livewire('favorite-pokemon', ['pokemon' => $pokemon, 'is_favorite' => $pokemon->is_favorite])
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
