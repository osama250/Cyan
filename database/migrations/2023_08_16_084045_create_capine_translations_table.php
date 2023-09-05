<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('capine_translations', function (Blueprint $table) {
            $table->id();
            $table->string('locale');
            $table->foreignId('capine_id');
            $table->text('type');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('capine_translations');
    }
};
