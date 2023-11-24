<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('trip_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            // $table->BigInteger('capine_id')->unsigned();
            $table->decimal('price');
            $table->text('comment')->nullable();
            // $table->string('uuid')->nullable();
            $table->tinyInteger('status')->nullable()->default(null)->comment('null => pending, 0 => failed, 1 => success');
            $table->string('payment_res_code')->default(null);
            $table->text('payment_res_msg')->default(null);
            $table->text('payment_res_full')->default(null);
            $table->foreign('trip_id')->references('id')->on('trips')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('capine_id')->references('id')->on('capines')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservations');
    }
};
