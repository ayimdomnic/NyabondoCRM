<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->increments('id');
            $table->string('school_code')->nullable();
            $table->string('school_name')->nullable();
            $table->string('registered')->nullable();
            $table->string('registration_no')->nullable();
            $table->string('accredited')->nullable();
            $table->string('SchoolProfile',4000)->nullable();
            $table->string('ownership_type')->nullable();
            $table->string('owner')->nullable();
            $table->string('region')->nullable();
            $table->string('district')->nullable();
            $table->string('postal_address')->nullable();
            $table->string('physical_address')->nullable();
            $table->string('school_head')->nullable();
            $table->string('mobile')->nullable();
            $table->string('telephone')->nullable();
            $table->string('fax')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('start_date')->nullable();
            $table->string('status')->nullable();
            $table->dateTime('created_date')->nullable();
            $table->integer('input_by');
            $table->integer('auth_by');
            $table->string('auth_status',1)->default('U');
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
        Schema::drop('schools');
    }
}
