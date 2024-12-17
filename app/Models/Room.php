<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table = 'rooms';
    protected $fillable = ['pencarian_id', 'room_number', 'room_type', 'price_per_night', 'facilities'];

    public function pencarian()
    {
        return $this->belongsTo(Pencarian::class, 'pencarian_id', 'id');
    }
}
