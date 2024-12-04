<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    protected $table = 'users'; // Nama tabel
    protected $primaryKey = 'user_id'; // Primary key jika bukan 'id'
    public $timestamps = false; // Jika tidak menggunakan timestamp

    protected $fillable = [
        'email', 'password', 'full_name', 'phone_number', 'address', 'role',
    ];
}


