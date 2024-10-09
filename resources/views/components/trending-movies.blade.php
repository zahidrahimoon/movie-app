<!-- resources/views/components/trending-movies.blade.php -->
<div class="container mx-auto px-4 py-12">
    <h1 class="text-3xl text-center mb-8 text-white font-bold">Trending Movies</h1>
    
    <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-5 gap-5">
        @foreach($trending_movies as $movie)
            @include('components.movie-card', ['movie' => $movie])
        @endforeach
    </div>
</div>
