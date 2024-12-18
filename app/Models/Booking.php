<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'bookings';
    protected $fillable = ['accommodation_id', 'room_id', 'name', 'email', 'date'];

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id', 'room_id');
    }

    public function accommodation()
    {
        return $this->belongsTo(Pencarian::class, 'accommodation_id', 'id');
    }
}
