<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStudentsTable extends Migration
{
  
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name')->nullable();
            $table->string('class')->nullable();
            $table->string('roll')->nullable();
            $table->string('id_no')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('father')->nullable();
            $table->string('monther')->nullable();
            });
    }

  
    public function down()
    {
        Schema::drop('students');
    }
}
