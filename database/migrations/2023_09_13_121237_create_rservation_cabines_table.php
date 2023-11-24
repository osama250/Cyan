<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('rservation_cabines', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('reservation_id')->unsigned();
            $table->BigInteger('capine_id')->unsigned();
            $table->BigInteger('cruise_id')->unsigned();
            $table->integer('capacity');
            $table->string('type');
            $table->integer('price');
            $table->integer('adults_count');
            $table->foreign('reservation_id')->references('id')->on('reservations')->onDelete('cascade');
            $table->foreign('capine_id')->references('id')->on('capines')->onDelete('cascade');
            $table->foreign('cruise_id')->references('id')->on('cruises')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rservation_cabines');
    }
};
