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
            $table->id();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->char('name',150);
            $table->text('description');
            $table->char('background',20)->nullable();
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->char('slug',100);
            $table->boolean('has_bitmoji')->default(0);
            $table->boolean('hide_login_kit')->nullable();
            $table->boolean('has_invite')->default(1);
            $table->text('allow_domains')->nullable();
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
        Schema::dropIfExists('events');
    }
};
