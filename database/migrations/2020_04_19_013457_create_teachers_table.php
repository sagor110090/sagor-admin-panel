<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTeachersTable extends Migration
{
  
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name')->nullable();
            $table->longText('address')->nullable();
            $table->integer('phone_no')->nullable();
            });
    }

  
    public function down()
    {
        Schema::drop('teachers');
    }
}
