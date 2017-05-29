<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description', 65535);
            $table->string('welcome_text', 200);
            $table->text('welcome_subtitle', 65535);
            $table->string('keywords');
            $table->integer('result_request')->unsigned()->comment('The max number of shots per request');
            $table->enum('status_page', array('0', '1'))->default('1')->comment('0 Offline, 1 Online');
            $table->enum('email_verification', array('0', '1'))->comment('0 Off, 1 On');
            $table->string('email_no_reply', 200);
            $table->string('email_admin', 200);
            $table->enum('captcha', array('on', 'off'))->nullable(false)->default('on');
            $table->integer('file_size_allowed')->unsigned()->comment('Size in Bytes');
            $table->string('twitter', 200);
            $table->string('facebook', 200);
            $table->string('googleplus', 200);
            $table->string('instagram', 200);
            $table->string('linkedin', 200);
            $table->string('angellist', 200);
            $table->char('currency_symbol', 10);
            $table->string('currency_code', 20);
            $table->integer('min_investment_amount')->unsigned();
            $table->integer('max_investment_amount')->unsigned();
            $table->integer('min_startup_amount')->unsigned();
            $table->integer('max_startup_amount')->unsigned();
            $table->string('payment_gateway')->default('Stripe');
            $table->string('stripe_secret_key');
            $table->string('stripe_public_key');
            $table->string('min_width_height_image', 100);
            $table->integer('fee_investment')->unsigned();
            $table->enum('auto_approve_startups', array('0', '1'))->nullabel(false)->default('1')->comment('0 No, 1 Yes');
            $table->enum('disable_startups_reg', array('no', 'yes'))->nullabel(false)->default('no');
            $table->enum('disable_investors_reg', array('no', 'yes'))->nullabel(false)->default('no');            
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
        Schema::dropIfExists('admin_settings');
    }
}
