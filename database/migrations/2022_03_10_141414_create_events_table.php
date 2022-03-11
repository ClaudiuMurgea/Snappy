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
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('event_details_id')->unsigned();
            $table->integer('domain_id')->unsigned();
            $table->integer('invite_id')->unsigned();
            $table->integer('bitmoji_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->timestamps();
            $table->foreign('event_details_id')->references('id')->on('event_details');
            $table->foreign('domain_id')->references('id')->on('domains');
            $table->foreign('invite_id')->references('id')->on('invites');
            $table->foreign('bitmoji_id')->references('id')->on('bitmojis');
            $table->foreign('category_id')->references('id')->on('categories');
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
        Schema::dropIfExists('events');
    }
};
