<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('side_seeing_photos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('side_seeing_id');
            $table->text('photo');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('side_seeing_photos');
    }
};
