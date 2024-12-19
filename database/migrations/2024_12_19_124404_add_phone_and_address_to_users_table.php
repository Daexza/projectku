<?php

// database/migrations/xxxx_xx_xx_xxxxxx_add_phone_and_address_to_users_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPhoneAndAddressToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->nullable(); // Add phone column
            $table->string('address')->nullable(); // Add address column
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['phone', 'address']); // Remove columns if rolled back
        });
    }
}