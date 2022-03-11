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
        Schema::create('setting_details', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumText('thank_you')->nullable();
            $table->mediumText('email_template')->nullable();
            $table->char('header_color',20)->nullable();
            $table->char('footer_color',20)->nullable();
            $table->char('email_subject',255)->nullable();
            $table->char('from_address',100)->nullable();
            $table->char('reply_to',100)->nullable();
            $table->text('bcc_list')->nullable();
            $table->char('order_description')->nullable();
            $table->char('order_title')->nullable();
            $table->char('from_name',50)->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('setting_details');
    }
};
