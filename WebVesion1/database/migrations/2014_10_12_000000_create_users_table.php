<?php

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
            $table->string('first_name')->nullable();
            $table->string('other_name')->nullable();
            $table->string('surname')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->unique()->nullable();
            $table->string('username')->unique();
            $table->string('password', 60);
            $table->integer('school_id')->nullable();
            $table->string('role');
            $table->string('profile_image')->nullable();
            $table->string('status', 60);
            $table->dateTime('last_login');
            $table->dateTime('last_logout');
            $table->integer('block')->default('0');
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
        Schema::drop('users');
    }
}
