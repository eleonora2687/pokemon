<x-layout>
    <div class="container-fluid d-flex flex-column align-items-center justify-content-start" style="height: 100vh;">
        <h1 class="text-center">Welcome to the Pokemon Database app!</h1>

        <a href="{{ route('all-pokemon') }}" class="btn btn-info col-md-6 col-10 d-block m-2">View All Pokemon</a>
        <a href="{{ route('only-favorite-pokemon') }}" class="btn btn-danger col-md-6 col-10 d-block m-2">View your favorites</a>
    </div>
</x-layout>
