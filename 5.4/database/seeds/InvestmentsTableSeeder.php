<?php

use Illuminate\Database\Seeder;

class InvestmentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('investments')->delete();
        
        \DB::table('investments')->insert(array (
            0 => 
            array (
                'id' => 1,
                'startups_id' => 3,
                'user_id' => 5,
                'txn_id' => 'null',
                'fullname' => 'Mark Cuban',
                'email' => 'investor@startupfundingclub.com',
                'country' => 'United Kingdom',
                'postal_code' => 'WC1H 8BU',
                'investment' => 150000,
                'valuation' => 2000000,
                'payment_gateway' => 'Stripe',
                'oauth_uid' => '',
                'comment' => 'Good Luck - Mark',
                'anonymous' => '0',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            1 => 
            array (
                'id' => 2,
                'startups_id' => 2,
                'user_id' => 5,
                'txn_id' => 'null',
                'fullname' => 'Mark Cuban',
                'email' => 'investor@startupfundingclub.com',
                'country' => 'United Kingdom',
                'postal_code' => 'WC1H 8BU',
                'investment' => 50000,
                'valuation' => 675000,
                'payment_gateway' => 'Stripe',
                'oauth_uid' => '',
                'comment' => 'Good Luck Torsion - Mark',
                'anonymous' => '0',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            2 => 
            array (
                'id' => 3,
                'startups_id' => 1,
                'user_id' => 5,
                'txn_id' => 'null',
                'fullname' => 'Mark Cuban',
                'email' => 'investor@startupfundingclub.com',
                'country' => 'United Kingdom',
                'postal_code' => 'WC1H 8BU',
                'investment' => 200000,
                'valuation' => 2000000,
                'payment_gateway' => 'Stripe',
                'oauth_uid' => '',
                'comment' => 'Good Luck Intupod - Mark',
                'anonymous' => '0',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
        ));
        
        
    }
}