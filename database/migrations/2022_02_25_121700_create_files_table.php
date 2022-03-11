<?php

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
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->char('name');
            $table->timestamps();
        });

        // $this->seedPermissions();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files');
        // Permission::where('name','Access Media Library')->first()->delete();
        // Role::find(1)->syncPermissions(Permission::all());
    }

    public function  seedPermissions(){
        $permissions = array(
            [ 'name' =>'Access Media Library', 'guard_name' =>'web'],
        );

        // DB::table('permissions')->insert($permissions);

        // Role::find(1)->syncPermissions(Permission::all());
    }
};
