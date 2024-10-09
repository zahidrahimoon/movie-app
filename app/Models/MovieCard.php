<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'release_date',
        'vote_average',
        'category',
        'video', // Add video to fillable attributes
        'image', // Add image to fillable attributes
    ];
}
