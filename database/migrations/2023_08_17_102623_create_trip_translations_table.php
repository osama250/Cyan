<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('trip_translations', function (Blueprint $table) {
            $table->id();
            $table->string('locale');
            $table->foreignId('trip_id');
            $table->text('name');
            $table->longText('description');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('trip_translations');
    }
};
