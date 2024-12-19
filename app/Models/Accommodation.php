<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Accommodation extends Model
{
    // Nama tabel (jika berbeda dengan nama model dalam bentuk jamak)
    protected $table = 'accommodations'; // Ganti dengan nama tabel yang sesuai di database

    // Kolom yang boleh diisi (sesuaikan dengan kolom yang ada di tabel)
    protected $fillable = ['name', 'location', 'price']; // Kolom yang sesuai dengan database Anda
}
