<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\MovieCard;
use App\Models\Theater;
use App\Models\GeoLocation;
use Illuminate\Http\Request;

class AdminBookingController extends Controller
{
    public function index()
    {
        // Retrieve all bookings for the admin panel with correct relationships
        $bookings = Booking::with('movieCard', 'theater', 'geoLocation')->get();
        return view('admins.booking.index', compact('bookings'));
    }

    public function edit($id)
    {
        // Fetch booking details for editing
        $booking = Booking::findOrFail($id);
        $movie_cards = MovieCard::all();
        $theaters = Theater::all();
        $locations = GeoLocation::all();

        return view('admins.booking.edit', compact('booking', 'movie_cards', 'theaters', 'locations'));
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

        // Update booking details
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

        return redirect()->route('admins.bookings.index')->with('success', 'Booking updated successfully!');
    }

    public function destroy($id)
    {
        // Delete the booking
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->route('admins.booking.index')->with('success', 'Booking deleted successfully!');
    }
}
