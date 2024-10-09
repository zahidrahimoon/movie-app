<?php

namespace App\Http\Controllers;

use App\Models\MovieCard;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        // Fetch all movie cards from the database
        $movie_cards = MovieCard::all();
    
        // Pass the movie data to the Blade view
        return view('movies', compact('movie_cards'));
    }

    public function show($id)
    {
        $movie = MovieCard::findOrFail($id);
        return view('movies.details', compact('movie'));
    }

    
}
