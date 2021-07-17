<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('role_id')->comment('1 for admin, 2 for user')->unique()->default(2);;
            $table->bigInteger('phone');
            $table->string('profile_image')->default(NULL);
            $table->tinyInteger('is_active')->comment('0 for deactivate, 1 for active')->default(1);
            $table->tinyInteger('device_type')->comment('1 for android, 2 for ios')->default(0);
            $table->string('device_token');
            $table->string('address')->default(NULL);
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
