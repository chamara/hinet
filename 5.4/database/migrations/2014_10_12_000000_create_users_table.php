<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->char('countries_id', 25);
            $table->char('password', 60);
            $table->string('email')->unique();
            $table->string('avatar', 70);
            $table->enum('status', array('pending','active','suspended','delete'))->nullabel(false)->default('active')->index();
            $table->enum('role', array('normal','admin','startup','investor'))->nullabel(false)->default('normal')->index();
            $table->string('remember_token', 100);
            $table->string('token', 80);
            $table->string('confirmation_code', 125);
            $table->string('payment_gateway', 50);
            $table->text('bank', 65535);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
