<?php

namespace App\Http\Controllers;

use App\Models\MovieCard;
use App\Models\Theater;
use App\Models\GeoLocation;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::where('user_id', auth()->id())->get();
        return view('booking.index', compact('bookings'));
    }

    public function create()
    {
        $movie_cards = MovieCard::all();
        $theaters = Theater::all();
        $locations = GeoLocation::all();

        return view('booking.create', compact('movie_cards', 'theaters', 'locations'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'movie_id' => 'required|exists:movies,id',
            'theater_id' => 'required|exists:theaters,id',
            'location_id' => 'required|exists:geo_locations,id',
            'date' => 'required|date',
            'seats' => 'required|integer',
        ]);
    
        // Create a new booking and associate it with the authenticated user
        $booking = new Booking([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'movie_id' => $request->input('movie_id'),
            'theater_id' => $request->input('theater_id'),
            'location_id' => $request->input('location_id'),
            'date' => $request->input('date'),
            'seats' => $request->input('seats'),
            'user_id' => auth()->id(), // Assign the authenticated user ID
        ]);
    
        $booking->save();
    
        return redirect()->route('bookings.index')->with('success', 'Booking created successfully.');
    }
    

    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        $movie_cards = MovieCard::all();
        $theaters = Theater::all();
        $locations = GeoLocation::all();

        return view('booking.edit', compact('booking', 'movie_cards', 'theaters', 'locations'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'movie' => 'required|exists:movie_cards,id',
            'theater' => 'required|exists:theaters,id',
            'location' => 'required|exists:geo_locations,id',
            'date' => 'required|date',
            'time' => 'required',
            'seats' => 'required|integer'
        ]);

        $booking = Booking::findOrFail($id);
        $booking->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'movie_cards_id' => $request->movie,
            'theater_id' => $request->theater,
            'geo_location_id' => $request->location,
            'date' => $request->date,
            'time' => $request->time,
            'seats' => $request->seats,
        ]);

        return redirect()->route('booking.index')->with('success', 'Booking updated successfully!');
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->route('booking.index')->with('success');
    }

    public function show($id)
    {
        $booking = Booking::findOrFail($id);
        return view('booking.show', compact('booking'));
    }
}
