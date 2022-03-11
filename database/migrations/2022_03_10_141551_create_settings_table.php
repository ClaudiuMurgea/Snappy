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
            $table->increments('id');
            $table->integer('setting_details_id')->unsigned()->nullable();
            $table->integer('setting_tracking_details_id')->unsigned()->nullable();
            $table->integer('event_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('setting_details_id')->references('id')->on('setting_details');
            $table->foreign('setting_tracking_details_id')->references('id')->on('setting_tracking_details');
            $table->foreign('event_id')->references('id')->on('events');
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
