<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('activity_translations', function (Blueprint $table) {
            $table->id();
            $table->string('locale');
            $table->foreignId('activity_id');
            $table->text('title');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('activity_translations');
    }
};
