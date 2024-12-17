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
        $table->date('available_from')->nullable();
        $table->date('available_to')->nullable();
    });
}

public function down()
{
    Schema::table('pencarian', function (Blueprint $table) {
        $table->dropColumn(['available_from', 'available_to']);
    });
}

};