<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->char('tracking_number',40)->nullable();
            $table->integer('event_id')->unsigned()->nullable();
            $table->integer('invite_id')->unsigned()->nullable();
            $table->integer('carrier_id')->unsigned()->nullable();
            $table->integer('order_details_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('event_id')->references('id')->on('events');
            $table->foreign('invite_id')->references('id')->on('invites');
            $table->foreign('carrier_id')->references('id')->on('carriers');
            $table->foreign('order_details_id')->references('id')->on('order_details');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
