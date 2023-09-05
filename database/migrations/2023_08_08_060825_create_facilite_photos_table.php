<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('facilite_photos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('facilite_id');
            $table->text('photo');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('facilite_photos');
    }
};
