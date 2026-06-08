<?php

namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class Category extends Model
{
    protected $fillable = ['name', 'slug', 'description'];
 
    // Satu kategori punya banyak tour
    public function tours()
    {
        return $this->hasMany(Tour::class);
    }
}