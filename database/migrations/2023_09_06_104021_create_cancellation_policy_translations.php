<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('cancellation_policy_translations', function (Blueprint $table) {
            $table->increments('trans_id');
            $table->integer('cancellation_id')->unsigned();
            $table->string('locale');
            $table->string('title');
            $table->string('content');

            $table->unique(['cancellation_id', 'locale']);
            $table->foreign('cancellation_id')->references('id')->on('cancellation_policies')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('cancellation_policy_translations');
    }
};
