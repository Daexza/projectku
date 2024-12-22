<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    // Nama tabel yang digunakan oleh model ini
    protected $table = 'bookings';

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'pencarian_id',
        'room_id',
        'name',
        'email',
        'check_in',
        'check_out',
        'total_price'
    ];

    // Relasi dengan model Pencarian
    public function pencarian()
    {
        return $this->belongsTo(Pencarian::class, 'pencarian_id', 'id');
    }

    // Relasi dengan model Room
    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id', 'room_id');
    }
}