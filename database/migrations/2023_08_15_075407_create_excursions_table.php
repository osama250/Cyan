<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('excursions', function (Blueprint $table) {
            $table->increments('id');
            $table->text('location');
            $table->text('image');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('excursions');
    }
};
