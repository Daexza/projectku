<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id('room_id'); // Primary key
            $table->unsignedBigInteger('pencarian_id'); // Foreign key
            $table->foreign('pencarian_id')
                  ->references('id')
                  ->on('pencarian')
                  ->onDelete('cascade');
            $table->string('room_number', 50);
            $table->enum('room_type', ['single', 'double', 'suite', 'deluxe', 'standard']);
            $table->decimal('price_per_night', 10, 2)->default(100000); // Default value
            $table->text('facilities')->nullable();
            $table->string('image_url')->nullable(); // Tambahkan kolom untuk URL gambar
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::table('rooms', function (Blueprint $table) {
            // Hapus foreign key constraint sebelum menghapus tabel
            $table->dropForeign(['pencarian_id']);
        });

        Schema::dropIfExists('rooms');
    }
};
