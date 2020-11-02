<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTest1sTable extends Migration
{
  
    public function up()
    {
        Schema::create('test1s', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            });
    }

  
    public function down()
    {
        Schema::drop('test1s');
    }
}
