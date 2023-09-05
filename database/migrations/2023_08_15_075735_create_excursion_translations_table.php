<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('excursion_translations', function (Blueprint $table) {
            $table->id();
            $table->string('locale');
            $table->foreignId('excursion_id');
            $table->text('title');
            $table->longText('description');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('excursion_translations');
    }
};
