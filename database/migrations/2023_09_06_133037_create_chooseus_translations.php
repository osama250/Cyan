<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('chooseus_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('choose_id')->unsigned();
            $table->string('locale');
            $table->string('title');
            $table->text('text');
            $table->timestamps();

            $table->unique(['choose_id', 'locale']);
            $table->foreign('choose_id')->references('id')->on('choices')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('chooseus_translations');
    }
};
