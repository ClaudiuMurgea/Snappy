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
        Schema::create('invites', function (Blueprint $table) {
            $table->increments('id');
            $table->char('first_name',100)->nullable();
            $table->char('last_name',100)->nullable();
            $table->char('email',100);
            $table->boolean('redeemed')->default(0);
            $table->integer('event_details_id')->unsigned();
            $table->timestamps();
            $table->foreign('event_details_id')->references('id')->on('event_details');
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
        Schema::dropIfExists('invites');
    }
};
