<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentEmergenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_emergencies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id');
            $table->string('Relationship');
            $table->string('First_Name');
            $table->string('Last_Name')->nullable();
            $table->string('Home_Phone')->nullable();
            $table->string('Work_Phone')->nullable();
            $table->string('Mobile_Phone')->nullable();
            $table->string('Email')->nullable();
            $table->string('address_line1')->nullable();
            $table->string('address_line2')->nullable();
            $table->string('region')->nullable();
            $table->string('district')->nullable();
            $table->string('city')->nullable();
            $table->string('postcode')->nullable();
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
        Schema::drop('student_emergencies');
    }
}
