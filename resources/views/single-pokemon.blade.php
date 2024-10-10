<x-layout>
    <div class="container-fluid m-1">
        <a href={{ route('all-pokemon')}} class="btn btn-primary mt-1">Back to all pokemon</a>
        <h2>This is the pokemon you requested: </h2>
        <div class="col-md-12">
            <x-pokemon-card :pokemon="$pokemon" :is_main_view="false" />
        </div>
    </div>
</x-layout>