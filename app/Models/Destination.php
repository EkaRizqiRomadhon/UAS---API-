<?php

namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class Destination extends Model
{
    protected $fillable = ['name', 'slug', 'kabupaten', 'provinsi', 'description', 'image'];
 
    // Many-to-many: satu destinasi bisa ada di banyak tour
    public function tours()
    {
        return $this->belongsToMany(Tour::class, 'destination_tour');
    }
 
    // Satu destinasi bisa punya banyak blog
    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
}