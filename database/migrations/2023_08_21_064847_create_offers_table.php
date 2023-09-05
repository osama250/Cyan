<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('trip_id')->constrained();
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('value');
            $table->enum('type',[0,1]);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('offers');
    }
};
