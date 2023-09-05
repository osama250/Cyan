<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('cruises', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->text('main_photo');
            $table->text('location');
            $table->text('media_link');
            $table->longText('info');
            $table->longText('dinning');
            $table->longText('features');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('cruises');
    }
};
