<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->decimal('price_per_night', 10, 2)->default(100000)->after('room_type');
        });
    }
    
    public function down()
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->dropColumn('price_per_night');
        });
    }    
};
