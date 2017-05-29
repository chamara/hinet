<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStartupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('startups', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('categories_id')->unsigned()->index();
            $table->string('token_id')->unique();
            $table->string('logo')->default('default.jpg');
            $table->string('cover')->default('default.jpg');
            $table->string('title');
            $table->text('description', 65535);
            $table->text('oneliner', 65535);
            $table->string('website');
            $table->string('twitter');
            $table->string('facebook');
            $table->string('linkedin');
            $table->string('pitchdeck');
            $table->string('status')->default('active');
            $table->integer('goal')->unsigned()->index();
            $table->decimal('equity', 6);
            $table->integer('valuation')->unsigned()->index();
            $table->string('tax');
            $table->string('location', 200);
            $table->enum('finalized', array('0', '1'))->nullabel(false)->default('0')->comment('0 No, 1 Yes');
            $table->enum('featured', array('0', '1'))->nullabel(false)->default('0')->comment('0 No, 1 Yes');
            $table->enum('opportunity', array('0', '1'))->nullabel(false)->default('0')->comment('0 No, 1 Yes');
            $table->enum('portfolio', array('0', '1'))->nullabel(false)->default('0')->comment('0 No, 1 Yes');
            $table->string('video');
            $table->text('problem', 65535);
            $table->text('solution', 65535);
            $table->text('market', 65535);
            $table->text('model', 65535);
            $table->text('traction', 65535);
            $table->text('competitors', 65535);
            $table->text('team', 65535);
            $table->text('spend', 65535);
            $table->text('strengths', 65535);
            $table->text('weaknesses', 65535);
            $table->text('why', 65535);
            $table->index(['user_id','status','token_id']);         
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
        Schema::dropIfExists('startups');
    }
}
