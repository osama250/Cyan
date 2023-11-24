<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('cruise_facilites', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cruise_id');
            $table->foreignId('facilite_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cruise_facilites');
    }
};
