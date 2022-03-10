<?php

use App\Models\Event;
use App\Models\Setting;
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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->mediumText('thank_you')->nullable();
            $table->mediumText('email_template')->nullable();
            $table->char('header_color',20)->nullable();
            $table->char('footer_color',20)->nullable();
            $table->unsignedBigInteger('event_id')->nullable();
            $table->char('order_description')->nullable();
            $table->char('page_title')->nullable();
            $table->char('order_title')->nullable();
            $table->char('from_name',50)->nullable();
            $table->timestamps();
        });

        // $this->seedSetting();

        // Setting::query()->truncate();
        // $events = Event::all();
        //     foreach ($events as $event){
        //         Setting::create([
        //                 'event_id' => $event->id
        //         ]);

        //     }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }

    // public function  seedSetting(){
    //     $setting = array(
    //         [ 'id' => 1],
    //     );

    //     DB::table('settings')->insert($setting);
    // }
};
