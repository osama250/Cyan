<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('dining_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dining_id')->unsigned();
            $table->string('locale');
            $table->string('title');
            $table->string('text');
            $table->timestamps();


            $table->unique(['dining_id', 'locale']);
            $table->foreign('dining_id')->references('id')->on('dinings')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('dining_translations');
    }
};
