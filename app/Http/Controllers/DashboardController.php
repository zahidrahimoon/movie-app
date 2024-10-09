<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Theater;
use App\Models\MovieCard;
use App\Models\Booking;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $userCount = User::count();
        $theaterCount = Theater::count();
        $movieCount = MovieCard::count();
        $bookingCount = Booking::count();

        return view('dashboard', compact('userCount', 'theaterCount', 'movieCount', 'bookingCount'));
    }
}
