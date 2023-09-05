<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->increments('id');
            $table->date('sailling_date');
            $table->time('time');
            $table->date('arrive_date');
            $table->text('main_photo');
            $table->longText('departs');
            $table->text('ports');
            $table->integer('price');
            $table->foreignId('cruise_id')->constrained();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('trips');
    }
};
