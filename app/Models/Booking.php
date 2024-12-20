<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'bookings';
    protected $fillable = ['accommodation_id', 'room_id', 'name', 'email', 'check_in', 'check_out', 'total_price'];

    /**
     * Relasi dengan tabel 'pencarian' (accommodations).
     */
    public function accommodation()
    {
        return $this->belongsTo(Pencarian::class, 'accommodation_id', 'id');
    }

    /**
     * Relasi dengan tabel 'rooms'.
     */
    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id', 'room_id');
        return $this->belongsTo(Room::class);
    }
}
