<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pencarian extends Model
{
    use HasFactory;

    protected $table = 'pencarian';
    protected $primaryKey = 'pencarian_id';
    protected $fillable = ['name', 'description', 'location', 'image_url', 'price', 'latitude', 'longitude', 'facilities', 'rating', 'phone_number'];
    public $timestamps = false; // Nonaktifkan timestamps (karena sudah diatur manual)
    public function rooms()
    {
        return $this->hasMany(Room::class, 'pencarian_id');
    }
}
