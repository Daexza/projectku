<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'bookings'; // Nama tabel
    protected $fillable = ['accommodation_id', 'name', 'email', 'date'];  // Sesuaikan dengan kolom di database

    // Relasi ke tabel accommodations
    public function accommodation()
    {
        return $this->belongsTo(Accommodation::class, 'accommodation_id');
    }
}
