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
            $table->id();
            $table->unsignedInteger('order_id');
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('product_modifier_id')->nullable();
            $table->unsignedInteger('product_modifier_option_id')->nullable();
            $table->softDeletes();
            $table->timestamps();
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
