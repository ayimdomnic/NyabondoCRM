<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('grade_name');
            $table->string('grade_from');
            $table->string('grade_to');
            $table->string('descriptions');
            $table->string('remarks');
            $table->string('status');
            $table->integer('level_id');
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
        Schema::drop('grades');
    }
}
