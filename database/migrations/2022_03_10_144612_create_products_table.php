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
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->char('name',100);
            $table->text('description')->nullable();
            $table->char('sku',100);
            $table->integer('event_id')->unsigned()->nullable();
            $table->integer('product_modifier_id')->unsigned()->nullable();
            $table->integer('bitmoji_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('event_id')->references('id')->on('events');
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
        Schema::dropIfExists('products');
    }
};
