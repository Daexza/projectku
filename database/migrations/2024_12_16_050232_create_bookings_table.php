<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('pencarian_id') // Foreign key untuk tabel 'pencarian'
                  ->constrained('pencarian')
                  ->onDelete('cascade');
            $table->foreignId('room_id') // Foreign key untuk tabel 'rooms'
                  ->constrained('rooms')
                  ->onDelete('cascade');
            $table->string('name');
            $table->string('email');
            $table->date('check_in');
            $table->date('check_out');
            $table->decimal('total_price', 10, 2)->default(0); // Menambahkan nilai default
            $table->string('payment_status')->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
