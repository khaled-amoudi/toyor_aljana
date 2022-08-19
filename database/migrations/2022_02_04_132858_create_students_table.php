<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('idNumber')->unique();
            $table->date('birthday');
            $table->string('stage')->default('البستان');
            $table->string('fastTest');
            $table->boolean('gender');
            $table->string('room_id');
            $table->text('location')->nullable();
            $table->string('phone');
            $table->string('fatherIdNumber');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('year_id');
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
        Schema::dropIfExists('students');
    }
}
