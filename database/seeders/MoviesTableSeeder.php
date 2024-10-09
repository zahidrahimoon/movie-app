<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MovieCard; // Import the MovieCard model

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Inserting sample movie records
        MovieCard::create([
            'title' => 'Day Movie 1',
            'release_date' => '2023-07-15',
            'vote_average' => 8.5,
            'category' => 'day',
            'video' => 'https://example.com/video1.mp4', // Example video URL
            'image' => 'https://image.tmdb.org/t/p/original/vOX1Zng472PC2KnS0B9nRfM8aaZ.jpg', // Example image URL
        ]);
        MovieCard::create([
            'title' => 'Day Movie 2',
            'release_date' => '2023-07-16',
            'vote_average' => 7.9,
            'category' => 'day',
            'video' => 'https://example.com/video2.mp4',
            'image' => 'https://image.tmdb.org/t/p/original/WiAEiqelck0NGWplhL5JQR12eg.jpg',
        ]);
        MovieCard::create([
            'title' => 'Day Movie 3',
            'release_date' => '2023-07-17',
            'vote_average' => 9.0,
            'category' => 'day',
            'video' => 'https://example.com/video3.mp4',
            'image' => 'https://image.tmdb.org/t/p/original/AjV6jFJ2YFIluYo4GQf13AA1tqu.jpg',
        ]);
        MovieCard::create([
            'title' => 'Week Movie 1',
            'release_date' => '2023-07-20',
            'vote_average' => 8.7,
            'category' => 'week',
            'video' => 'https://example.com/video4.mp4',
            'image' => 'https://image.tmdb.org/t/p/original/1qxRfQq9BI9dZ1nOztEtTkqNgea.jpg',
        ]);
        MovieCard::create([
            'title' => 'Week Movie 2',
            'release_date' => '2023-07-21',
            'vote_average' => 7.8,
            'category' => 'week',
            'video' => 'https://example.com/video5.mp4',
            'image' => 'https://image.tmdb.org/t/p/original/x9YC2rpXHUFMqI1hCekKDm9UE4w.jpg',
        ]);
      
    }
}
