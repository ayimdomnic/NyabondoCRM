<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademicSetupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_setups', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('current_year');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('school_id');
            $table->string('approved');
            $table->string('approved_by');
            $table->string('date_settled');
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
        Schema::drop('academic_setups');
    }
}
