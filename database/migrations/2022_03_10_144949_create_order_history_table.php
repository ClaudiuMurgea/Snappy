<?php

use App\Models\Carrier;
use App\Models\Order;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
// use Spatie\Permission\Models\Permission;
// use Spatie\Permission\Models\Role;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->unsigned()->nullable();
            $table->dateTime('date')->nullable();
            $table->char('status_description')->nullable();
            $table->char('details')->nullable();
            $table->timestamps();
            $table->foreign('order_id')->references('id')->on('orders');
            $table->softDeletes();
        });

        $this->seedPermission();

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
        Schema::dropIfExists('order_histories');
        // Permission::where('name','Add Orders')->first()->delete();
        // Role::find(1)->syncPermissions(Permission::all());
    }

        public function  seedPermission(){
            $permissions = array(
                [ 'name' =>'Add Orders', 'guard_name' =>'web'],

            );
            // Role::find(1)->syncPermissions(Permission::all());
            // DB::table('permissions')->insert($permissions);
    }
};
