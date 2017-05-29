<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvestmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('startups_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->string('txn_id');
            $table->string('fullname', 200);
            $table->string('email', 200);
            $table->string('country', 100);
            $table->string('postal_code', 100);
            $table->integer('investment')->unsigned();
            $table->integer('valuation');
            $table->string('payment_gateway', 100);
            $table->string('oauth_uid', 200);
            $table->string('comment', 200);
            $table->enum('anonymous', array('0', '1'))->nullable(false)->default('0')->comment('0 No, 1 Yes');
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
        Schema::dropIfExists('investments');
    }
}
