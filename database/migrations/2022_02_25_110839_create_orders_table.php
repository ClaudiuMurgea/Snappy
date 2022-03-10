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
            $table->id();
            $table->unsignedBigInteger('invite_id')->nullable();
            $table->unsignedBigInteger('event_id');
            $table->char('email',100)->nullable();
            $table->char('first_name',100);
            $table->char('last_name',100);
            $table->char('address',255);
            $table->char('address2',255)->nullable();
            $table->char('city',100);
            $table->char('state',255)->nullable();
            $table->char('zip',20)->nullable();
            $table->char('country',255);
            $table->char('phone',20)->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('product_modifier_id')->nullable();
            $table->unsignedBigInteger('product_modifier_option_id')->nullable();
            $table->unsignedBigInteger( 'carrier_id')->nullable();
            $table->char('carrier')->nullable();
            $table->char('tracking_number',40)->nullable();
            $table->char('snapchat_display_name',100)->nullable();
            $table->char('bitmoji_avatar',255)->nullable();
            $table->char('snapchat_external_id',255)->nullable();            
            $table->softDeletes();
            $table->timestamps();
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
