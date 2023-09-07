<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('accommodation_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('accommodation_id')->unsigned();
            $table->string('locale');
            $table->string('title');
            $table->string('text');
            $table->timestamps();

            $table->unique(['accommodation_id', 'locale']);
            $table->foreign('accommodation_id')->references('id')->on('accommodations')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('accommodation_translations');
    }
};
