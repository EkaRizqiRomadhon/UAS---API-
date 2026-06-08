<?php

namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class Blog extends Model
{
    protected $fillable = [
        'user_id', 'destination_id', 'title', 'slug', 'tag',
        'excerpt', 'body', 'image', 'published_at', 'is_published',
    ];
 
    protected $casts = [
        'published_at' => 'date',
        'is_published' => 'boolean',
    ];
 
    // Blog ditulis oleh satu user
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
 
    // Blog opsional terkait ke satu destinasi
    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}