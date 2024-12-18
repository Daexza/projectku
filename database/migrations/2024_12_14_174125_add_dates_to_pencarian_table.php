<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('pencarian', function (Blueprint $table) {
            // Periksa apakah kolom 'available_from' sudah ada
            if (!Schema::hasColumn('pencarian', 'available_from')) {
                $table->date('available_from')->nullable();
            }
            
            // Periksa apakah kolom 'available_to' sudah ada
            if (!Schema::hasColumn('pencarian', 'available_to')) {
                $table->date('available_to')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('pencarian', function (Blueprint $table) {
            // Hapus kolom hanya jika kolom tersebut ada
            if (Schema::hasColumn('pencarian', 'available_from')) {
                $table->dropColumn('available_from');
            }
            if (Schema::hasColumn('pencarian', 'available_to')) {
                $table->dropColumn('available_to');
            }
        });
    }
};
