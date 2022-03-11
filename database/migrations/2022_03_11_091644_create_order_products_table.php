<?php

use App\Models\Carrier;
use App\Models\Order;
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
        Schema::create('order_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->unsigned()->nullable();
            $table->integer('product_id')->unsigned()->nullable();
            $table->integer('product_modifier_id')->unsigned()->nullable();
            $table->integer('product_modifier_option_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('product_modifier_id')->references('id')->on('product_modifiers');
            $table->foreign('product_modifier_option_id')->references('id')->on('product_modifier_options');
            $table->softDeletes();
        });

        $orders = Order::all();
        foreach ($orders as $order){
            if ($order->carrier){
                $courier = Carrier::where('code',$order->carrier)->first();
                $order->carrier_id = $courier->id;
                $order->update();
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_products');
    }
};
