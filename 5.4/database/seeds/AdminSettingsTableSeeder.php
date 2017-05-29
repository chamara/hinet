<?php

use Illuminate\Database\Seeder;

class AdminSettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admin_settings')->delete();
        
        \DB::table('admin_settings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Startup Funding Club',
                'description' => 'Startup Funding Club.',
                'welcome_text' => 'Invest in UK Startups',
                'welcome_subtitle' => 'SEIS Funds, Angel Investing, Startup Services, Mentoring and Advisory',
                'keywords' => 'Startup Funding Club',
                'result_request' => 8,
                'status_page' => '1',
                'email_verification' => '0',
                'email_no_reply' => 'no-reply@startupfundingclub.com',
                'email_admin' => 'admin@startupfundingclub.com',
                'captcha' => 'off',
                'file_size_allowed' => 10240,
                'twitter' => 'https://twitter.com/Startupfundingc',
                'facebook' => 'https://www.facebook.com/startupfundingclub',
                'googleplus' => '',
                'instagram' => '',
                'linkedin' => 'https://www.linkedin.com/company-beta/3856489/',
                'angellist' => 'https://angel.co/startup-funding-club',
                'currency_symbol' => '£',
                'currency_code' => 'GBP',
                'min_investment_amount' => 500,
                'max_investment_amount' => 10000000,
                'min_startup_amount' => 1,
                'max_startup_amount' => 1000000000,
                'payment_gateway' => 'Stripe',
                'stripe_secret_key' => 'sk_test_ARt2v7nFjwPLkuS5frQ3cv2L',
                'stripe_public_key' => 'pk_test_MX1EveIPBcvcB3bEt2YZFWL0',
                'min_width_height_image' => '800x400',
                'fee_investment' => 6,
                'auto_approve_startups' => '1',
                'disable_startups_reg' => '0',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
        ));
        
        
    }
}