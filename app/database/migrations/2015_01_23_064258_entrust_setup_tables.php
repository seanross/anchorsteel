<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class EntrustSetupTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        // Creates the roles table
        Schema::create('roles', function ($table) {
            $table->increments('id')->unsigned();
            $table->string('name')->unique();
            $table->timestamps();
        });

        // Creates the assigned_roles (Many-to-Many relation) table
        Schema::create('assigned_roles', function ($table) {
            $table->increments('id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('role_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles');
        });

        // Creates the permissions table
        Schema::create('permissions', function ($table) {
            $table->increments('id')->unsigned();
            $table->string('name')->unique();
            $table->string('display_name');
            $table->timestamps();
        });

        // Creates the permission_role (Many-to-Many relation) table
        Schema::create('permission_role', function ($table) {
            $table->increments('id')->unsigned();
            $table->integer('permission_id')->unsigned();
            $table->integer('role_id')->unsigned();
            $table->foreign('permission_id')->references('id')->on('permissions'); // assumes a users table
            $table->foreign('role_id')->references('id')->on('roles');
        });


        $buyer = new Role();
        $buyer->name = 'Buyer';
        $buyer->save();

        $admin = new Role();
        $admin->name = 'Admin';
        $admin->save();

        $buy = new Permission();
        $buy->name = 'can_buy';
        $buy->display_name = 'Can Buy Products';
        $buy->save();

        $edit = new Permission();
        $edit->name = 'can_edit';
        $edit->display_name = 'Can Edit Contents';
        $edit->save();

        $buyer->attachPermission($buy);
        $admin->attachPermission($edit);
        $admin->attachPermission($edit);

        $u = new User();
        $u->email = 'wala@yahoo.com';
        $u->username = 'admin';
        $u->password = Hash::make('1234');
        $u->firstname = "Jose";
        $u->middlename= "Protacio";
        $u->lastname = "Rizal";
        $u->address = "Philippines Bagong Bayan";
        $u->contactno = "998877665544332211";
        $u->save();

        $u->roles()->attach($admin);
    }

    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        Schema::table('assigned_roles', function (Blueprint $table) {
            $table->dropForeign('assigned_roles_user_id_foreign');
            $table->dropForeign('assigned_roles_role_id_foreign');
        });

        Schema::table('permission_role', function (Blueprint $table) {
            $table->dropForeign('permission_role_permission_id_foreign');
            $table->dropForeign('permission_role_role_id_foreign');
        });

        Schema::drop('assigned_roles');
        Schema::drop('permission_role');
        Schema::drop('roles');
        Schema::drop('permissions');
    }

}
