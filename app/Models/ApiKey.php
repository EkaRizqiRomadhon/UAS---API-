<?php
// app/Models/ApiKey.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ApiKey extends Model
{
    protected $fillable = ['user_id', 'name', 'key', 'is_active', 'last_used_at'];

    protected $casts = [
        'is_active'    => 'boolean',
        'last_used_at' => 'datetime',
    ];

    // Generate random API key
    public static function generate(): string
    {
        return 'mlaku_' . Str::random(48);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}