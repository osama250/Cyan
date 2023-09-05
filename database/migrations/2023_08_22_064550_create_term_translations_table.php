<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('term_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('term_id');
            $table->text('locale');
            $table->text('title');
            $table->longText('description');
            $table->longText('seo');
            $table->longText('key_words');
            $table->longText('focus_keyword');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('term_translations');
    }
};
