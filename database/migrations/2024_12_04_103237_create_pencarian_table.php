<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pencarian', function (Blueprint $table) {
            $table->id(); // Kolom id dengan tipe bigint unsigned
            $table->string('name', 100);
            $table->text('description')->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->string('phone_number', 20)->nullable();
            $table->text('facilities')->nullable();
            $table->text('location')->nullable();
            $table->decimal('rating', 2, 1)->default(0);
            $table->string('image_url')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pencarian');
    }
};
