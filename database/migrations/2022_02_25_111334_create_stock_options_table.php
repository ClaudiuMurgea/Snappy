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
        Schema::create('stock_options', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_modifier_option_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedInteger('amount');
            $table->char('sku',50)->nullable();
            $table->timestamps();
            $table->foreign('product_modifier_option_id')->references('id')->on('product_modifier_options');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_options');
    }
};
