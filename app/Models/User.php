<?php
// app/Models/User.php
// Tambahkan implements JWTSubject dan 2 method di bawah

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject; // ← tambah ini

#[Fillable(['name', 'email', 'password', 'phone', 'role'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable implements JWTSubject // ← tambah implements
{
    use HasFactory, Notifiable;

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
        ];
    }

    // ── Wajib untuk JWT ──────────────────────────────
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims(): array
    {
        return [
            'role'  => $this->role,
            'email' => $this->email,
        ];
    }

    // ── Relasi ───────────────────────────────────────
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    public function apiKeys()
    {
        return $this->hasMany(ApiKey::class);
    }
}