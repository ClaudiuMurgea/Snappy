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
        Schema::create('product_modifier_options', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('order')->default(0);
            $table->char('name',100);
            $table->integer('product_modifier_id')->unsigned();
            $table->integer('bitmoji_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('product_modifier_id')->references('id')->on('product_modifiers');
            $table->foreign('bitmoji_id')->references('id')->on('bitmojis');
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
        Schema::dropIfExists('product_modifier_options');
    }
};
