<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default('default');
            $table->integer('startups_id')->unsigned()->index();
            $table->string('avatar')->default('default.jpg');
            $table->string('title');
            $table->text('bio', 65535);
            $table->string('linkedin');
            $table->string('email');
            $table->decimal('shareholding', 6);
            $table->string('token_id')->index();       
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
        Schema::dropIfExists('teams');
    }
}
