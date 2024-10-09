<?php
// app/Http/Controllers/AdminsMovieController.php

namespace App\Http\Controllers;

use App\Models\MovieCard;
use Illuminate\Http\Request;

class AdminMovieController extends Controller
{
    public function index()
    {
        $movie_cards = MovieCard::all();
        return view('admins.movies.index', compact('movie_cards'));
    }

    public function create()
    {
        return view('admins.movies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'release_date' => 'required|date',
            'vote_average' => 'required|numeric',
            'category' => 'required',
            'video' => 'required',
            'image' => 'required|url', // now it validates that it's a URL
        ]);
    
        MovieCard::create([
            'title' => $request->title,
            'release_date' => $request->release_date,
            'vote_average' => $request->vote_average,
            'category' => $request->category,
            'video' => $request->video,
            'image' => $request->image, // store the URL directly
        ]);
    
        return redirect()->route('admins.movies.index')->with('success', 'Movie created successfully.');
    }
    
    public function edit(MovieCard $movie)
    {
        return view('admins.movies.edit', compact('movie'));
    }

    public function update(Request $request, MovieCard $movie)
    {
        $request->validate([
            'title' => 'required',
            'release_date' => 'required|date',
            'vote_average' => 'required|numeric',
            'category' => 'required',
            'video' => 'required',
            'image' => 'nullable|url', // allow null but validate if provided
        ]);
    
        $movie->update([
            'title' => $request->title,
            'release_date' => $request->release_date,
            'vote_average' => $request->vote_average,
            'category' => $request->category,
            'video' => $request->video,
            'image' => $request->image, // update with the provided URL
        ]);
    
        return redirect()->route('admins.movies.index')->with('success', 'Movie updated successfully.');
    }
    

    public function destroy(MovieCard $movie)
    {
        // Delete the image
        if ($movie->image) {
            \Storage::disk('public')->delete($movie->image);
        }
        
        $movie->delete();
        return redirect()->route('admins.movies.index')->with('success', 'Movie deleted successfully.');
    }
}
