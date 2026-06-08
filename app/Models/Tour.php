<?php

namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class Tour extends Model
{
    protected $fillable = [
        'category_id', 'title', 'slug', 'description',
        'duration_days', 'max_people', 'price', 'rating', 'image', 'is_active',
    ];
 
    // Tour belongs to satu kategori
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
 
    // Many-to-many: satu tour mencakup banyak destinasi
    public function destinations()
    {
        return $this->belongsToMany(Destination::class, 'destination_tour');
    }
 
    // Satu tour bisa punya banyak booking
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}