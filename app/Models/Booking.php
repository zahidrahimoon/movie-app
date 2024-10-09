<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'movie_cards_id',
        'theater_id',
        'geo_location_id',
        'date',
        'time',
        'seats',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function movieCard()
    {
        return $this->belongsTo(MovieCard::class);
    }
        // Define the relationship with Theater (if applicable)
        public function theater()
        {
            return $this->belongsTo(Theater::class);
        }
    
        // Define the relationship with GeoLocation (if applicable)
        public function geoLocation()
        {
            return $this->belongsTo(GeoLocation::class);
        }
}
