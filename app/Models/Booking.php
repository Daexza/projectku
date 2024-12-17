<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'bookings'; // Nama tabel
    protected $fillable = ['accommodation_id', 'name', 'email', 'date'];

    // Relasi ke tabel pencarian
    public function accommodation()
    {
        return $this->belongsTo(Pencarian::class, 'accommodation_id');
    }
}
