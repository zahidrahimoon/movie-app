<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Models\MovieCard;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminMovieController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MovieFilterController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/details', function () {
    return view('details');
});


Route::get('/', [MovieFilterController::class, 'index']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/signup', [AuthController::class, 'showSignupForm'])->name('signup');
Route::post('/signup', [AuthController::class, 'signup']);

Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');

Route::get('/movies', [MovieController::class, 'index'])->name('movies.index');
Route::get('/movies/{id}', [MovieController::class, 'show'])->name('movies.details');


Route::get('/search', [MovieFilterController::class, 'search'])->name('search');


// Apply auth.user middleware to user routes
Route::middleware(['auth'])->group(function () {
    Route::get('/booking', [BookingController::class, 'create'])->name('booking.create');
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
    Route::put('/profile/update', [AuthController::class, 'update'])->name('profile.update');
    Route::resource('booking', BookingController::class);
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/adminmovies', function () {
    return view('adminmovies');
});

// routes/web.php

Route::prefix('admin')->group(function () {
    Route::get('/movies', [AdminMovieController::class, 'index'])->name('admins.movies.index');
    Route::get('/movies/create', [AdminMovieController::class, 'create'])->name('admins.movies.create');
    Route::post('/movies', [AdminMovieController::class, 'store'])->name('admins.movies.store');
    Route::get('/movies/{movie}/edit', [AdminMovieController::class, 'edit'])->name('admins.movies.edit');
    Route::put('/movies/{movie}', [AdminMovieController::class, 'update'])->name('admins.movies.update');
    Route::delete('/movies/{movie}', [AdminMovieController::class, 'destroy'])->name('admins.movies.destroy');
});

// routes/web.php
Route::prefix('admin')->group(function () {
    Route::get('/bookings', [App\Http\Controllers\AdminBookingController::class, 'index'])->name('admins.booking.index');
    Route::get('/bookings/{id}/edit', [App\Http\Controllers\AdminBookingController::class, 'edit'])->name('admins.booking.edit');
    Route::put('/bookings/{id}', [App\Http\Controllers\AdminBookingController::class, 'update'])->name('admins.booking.update');
    Route::delete('/bookings/{id}', [App\Http\Controllers\AdminBookingController::class, 'destroy'])->name('admins.booking.destroy');
    // routes/web.php

Route::get('/admin/users', [UserController::class, 'index'])->name('user'); // Display all users
Route::delete('/admin/users/{id}', [UserController::class, 'destroy'])->name('user.destroy'); // Delete a user
Route::post('/admin/users/{id}/grant-admin', [UserController::class, 'grantAdmin'])->name('user.grantAdmin'); // Grant admin access

});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
