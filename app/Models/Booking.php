<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'bookings';
    protected $fillable = ['pencarian_id', 'room_id', 'name', 'email', 'check_in', 'check_out', 'total_price'];

    public function pencarian()
    {
        return $this->belongsTo(Pencarian::class, 'pencarian_id', 'id');
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id', 'room_id');
    }
}
