<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('cruise_itenerarie_translations', function (Blueprint $table) {
            $table->id();
            $table->string('locale');
            $table->foreignId('cruise_itenerarie_id');
            $table->text('name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cruise_itenerarie_translations');
    }
};
