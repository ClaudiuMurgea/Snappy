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
        Schema::create('setting_tracking_details', function (Blueprint $table) {
            $table->increments('id');
            $table->char('tracking_from_name',50)->nullable();
            $table->char('tracking_from_address',100)->nullable();
            $table->char('tracking_email_subject',150)->nullable();
            $table->char('tracking_reply_to',100)->nullable();
            $table->text('tracking_bcc_list')->nullable();
            $table->text('tracking_content_text')->nullable();
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
        Schema::dropIfExists('setting_tracking_details');
    }
};
