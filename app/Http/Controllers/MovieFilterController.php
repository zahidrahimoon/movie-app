<?php

namespace App\Http\Controllers;

use App\Models\MovieCard; // Make sure to import the MovieCard model
use Illuminate\Http\Request;

class MovieFilterController extends Controller
{
    public function index()
    {
        // Fetching movies based on specific criteria
        $trending_movies = MovieCard::where('release_date', '>=', now()->subYear())
                                     ->where('vote_average', '>=', 8)
                                     ->take(5)
                                     ->get();

        $recommended_movies = MovieCard::where('vote_average', '>=', 9)
                                        ->get();

                                        $most_watched_movies = MovieCard::orderBy('created_at', 'desc') // You can use 'rating' or any valid column
                                        ->take(5) // Fetch top 10 movies
                                        ->get();
        // Pass categorized movie data to the Blade view
        return view('welcome', compact('trending_movies', 'recommended_movies', 'most_watched_movies'));
    }

}
