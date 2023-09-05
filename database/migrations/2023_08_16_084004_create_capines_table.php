<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('capines', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('capacity');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('capines');
    }
};
