<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('ages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('from');
            $table->integer('to');
            $table->integer('value');
            $table->enum('type',[0,1]);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('ages');
    }
};
