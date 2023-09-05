<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('blog_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('blog_id');
            $table->text('locale');
            $table->text('title');
            $table->longText('brief');
            $table->longText('description');
            $table->longText('seo');
            $table->longText('keywords');
            $table->longText('focus_keyword');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('blog_translations');
    }
};
