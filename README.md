Here’s how the ER diagram translates into database tables for a movie booking system:

### 1. **Movies Table**

| Column Name     | Data Type   | Constraints         |
|-----------------|-------------|---------------------|
| Movie_ID        | INT         | PRIMARY KEY         |
| Title           | VARCHAR(255)| NOT NULL            |
| Genre           | VARCHAR(100)| NOT NULL            |
| Release_Date    | DATE        | NOT NULL            |
| Thumbnail_Image | VARCHAR(255)| NOT NULL            |
| Hover_Video     | VARCHAR(255)|                     |
| Duration        | TIME        | NOT NULL            |
| Description     | TEXT        |                     |

### 2. **Users Table**

| Column Name     | Data Type   | Constraints         |
|-----------------|-------------|---------------------|
| User_ID         | INT         | PRIMARY KEY         |
| Username        | VARCHAR(100)| NOT NULL, UNIQUE    |
| Email           | VARCHAR(100)| NOT NULL, UNIQUE    |
| Password        | VARCHAR(255)| NOT NULL            |

### 3. **Ratings Table**

| Column Name     | Data Type   | Constraints         |
|-----------------|-------------|---------------------|
| Rating_ID       | INT         | PRIMARY KEY         |
| User_ID         | INT         | FOREIGN KEY (Users)  |
| Movie_ID        | INT         | FOREIGN KEY (Movies) |
| Rating_Percentage| DECIMAL(5,2)|                     |
| Review          | TEXT        |                     |

### 4. **Showtimes Table**

| Column Name     | Data Type   | Constraints         |
|-----------------|-------------|---------------------|
| Showtime_ID     | INT         | PRIMARY KEY         |
| Movie_ID        | INT         | FOREIGN KEY (Movies) |
| Date            | DATE        | NOT NULL            |
| Start_Time      | TIME        | NOT NULL            |
| End_Time        | TIME        | NOT NULL            |
| Available_Seats | INT         | NOT NULL            |

### 5. **Bookings Table**

| Column Name     | Data Type   | Constraints         |
|-----------------|-------------|---------------------|
| Booking_ID      | INT         | PRIMARY KEY         |
| User_ID         | INT         | FOREIGN KEY (Users)  |
| Showtime_ID     | INT         | FOREIGN KEY (Showtimes) |
| Number_Of_Seats | INT         | NOT NULL            |
| Payment_Status  | VARCHAR(50) | NOT NULL            |

### Relationships:
1. **Movies and Showtimes**: One-to-Many (A movie can have multiple showtimes).
2. **Users and Ratings**: One-to-Many (A user can give multiple ratings, but each rating is for one movie).
3. **Users and Bookings**: One-to-Many (A user can make multiple bookings for different showtimes). 

This structure represents the relationships and key attributes of the system. Each table connects via foreign keys where appropriate, and it is optimized for data integrity and normalization.











To achieve your goal of displaying three separate components (`Trending`, `Recommendation`, and `Most Watched`) based on the `category` column in your `MovieCard` model, you can follow these steps:

### Step 1: Create Three Separate Blade Components
You can create three Blade components, each for the respective categories (`Trending`, `Recommendation`, and `Most Watched`).

#### TrendingComponent
```php
<!-- resources/views/components/trending-movies.blade.php -->
<div class="container mx-auto px-4 py-12">
    <h1 class="text-3xl text-center mb-8 text-white font-bold">Trending Movies</h1>
    
    <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-5 gap-5">
        @foreach($trending_movies as $movie)
            @include('components.movie-card', ['movie' => $movie])
        @endforeach
    </div>
</div>
```

#### RecommendationComponent
```php
<!-- resources/views/components/recommendation-movies.blade.php -->
<div class="container mx-auto px-4 py-12">
    <h1 class="text-3xl text-center mb-8 text-white font-bold">Recommended Movies</h1>

    <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-5 gap-5">
        @foreach($recommended_movies as $movie)
            @include('components.movie-card', ['movie' => $movie])
        @endforeach
    </div>
</div>
```

#### MostWatchedComponent
```php
<!-- resources/views/components/most-watched-movies.blade.php -->
<div class="container mx-auto px-4 py-12">
    <h1 class="text-3xl text-center mb-8 text-white font-bold">Most Watched Movies</h1>

    <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-5 gap-5">
        @foreach($most_watched_movies as $movie)
            @include('components.movie-card', ['movie' => $movie])
        @endforeach
    </div>
</div>
```

### Step 2: Create a MovieCard Blade Component
You can use a reusable Blade component for displaying each movie's card.

```php
<!-- resources/views/components/movie-card.blade.php -->
<div class="w-full cursor-pointer group">
    <div class="relative aspect-[2/3] mb-3 overflow-hidden rounded-lg shadow-md">
        <img src="{{ $movie->image }}" alt="{{ $movie->title }}" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
        
        <!-- Hover Overlay and other features from your existing code -->
        <!-- ... -->
        
        <!-- Rating Circle (This part remains the same) -->
        <div class="absolute -bottom-7 left-3 w-12 h-12 sm:w-14 sm:h-14 md:w-16 md:h-16 bg-gray-900 rounded-full flex items-center justify-center text-xs sm:text-sm md:text-base font-bold z-10 transform -translate-y-1/2">
            <svg class="w-full h-full -rotate-90" viewBox="0 0 36 36">
                <circle cx="18" cy="18" r="16" fill="none" stroke="#3d3d3d" stroke-width="2"></circle>
                <circle cx="18" cy="18" r="16" fill="none" 
                        stroke="{{ $movie->vote_average >= 8 ? '#21d07a' : ($movie->vote_average >= 4 ? '#d2d531' : '#db2360') }}" 
                        stroke-width="2" 
                        stroke-dasharray="100" 
                        stroke-dashoffset="{{ 100 - ($movie->vote_average * 10) }}">
                </circle>
            </svg>
            <span class="absolute text-white text-xs sm:text-sm md:text-base">{{ number_format($movie->vote_average, 1) }}</span>
        </div>
    </div>
    <div class="text-white mt-4">
        <h3 class="text-lg font-medium mb-1 line-clamp-1">{{ $movie->title }}</h3>
        <p class="text-lg text-gray-400">{{ \Carbon\Carbon::parse($movie->release_date)->format('M d, Y') }}</p>
    </div>
</div>
```

### Step 3: Update the MovieController
In your `MovieController`, you will now query movies based on the `category` field and pass them to each of the three components.

```php
<?php

namespace App\Http\Controllers;

use App\Models\MovieCard;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        // Fetch movies based on their category
        $trending_movies = MovieCard::where('category', 'Trending')->get();
        $recommended_movies = MovieCard::where('category', 'Recommendation')->get();
        $most_watched_movies = MovieCard::where('category', 'Most Watched')->get();
        
        return view('movies.index', compact('trending_movies', 'recommended_movies', 'most_watched_movies'));
    }
}
```

### Step 4: Create the Main Blade View
Finally, create the main view that will display the three sections for Trending, Recommended, and Most Watched movies.

```php
<!-- resources/views/movies/index.blade.php -->
@extends('layouts.app')

@section('content')
    <x-trending-movies :trending-movies="$trending_movies" />
    <x-recommendation-movies :recommended-movies="$recommended_movies" />
    <x-most-watched-movies :most-watched-movies="$most_watched_movies" />
@endsection
```

### Conclusion
This setup will display three separate movie sections (`Trending`, `Recommendation`, and `Most Watched`), each filtered by its respective category. Each section uses its Blade component, making it easy to maintain and extend.