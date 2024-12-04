<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id('room_id'); // Kolom id untuk rooms
            $table->foreignId('pencarian_id')->constrained('pencarian')->onDelete('cascade');
            $table->string('room_number', 50);
            $table->enum('room_type', ['single', 'double', 'suite']);
            $table->decimal('price_per_night', 10, 2);
            $table->text('facilities')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
