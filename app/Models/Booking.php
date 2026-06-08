<?php

namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class Booking extends Model
{
    protected $fillable = [
        'user_id', 'tour_id', 'booking_code',
        'check_in', 'jumlah_orang', 'total_harga', 'status', 'catatan',
    ];
 
    // Booking milik satu user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
 
    // Booking milik satu tour
    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
}