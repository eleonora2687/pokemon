<x-layout>
    <div class="container-fluid">
        <h1 class="col-md-12">Welcome to the Pokemon Database app!</h1>

        <a href={{ route('all-pokemon')}} class="btn btn-info col-md-6 d-block m-1">View All Pokemon</a>
        <a href={{ route('only-favorite-pokemon')}} class="btn btn-danger col-md-6 d-block m-1">View your favorites</a>
    </div>
</x-layout>