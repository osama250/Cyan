<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('side_seeings', function (Blueprint $table) {
            $table->increments('id');
            $table->text('main_photo');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('side_seeings');
    }
};
