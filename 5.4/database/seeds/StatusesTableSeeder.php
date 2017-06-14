<?php

use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('statuses')->delete();
        
        \DB::table('statuses')->insert(array (
            0 => 
            array (
                'id' => 1,
                'status' => 'pending',
                'table' => 'startups',
                'mode' => 'on',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            1 => 
            array (
                'id' => 2,
                'status' => 'active',
                'table' => 'startups',
                'mode' => 'on',                
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            2 => 
            array (
                'id' => 3,
                'status' => 'finalized',
                'table' => 'startups',
                'mode' => 'on',                
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            3 => 
            array (
                'id' => 4,
                'status' => 'pending',
                'table' => 'users',
                'mode' => 'on',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            4 => 
            array (
                'id' => 5,
                'status' => 'active',
                'table' => 'users',
                'mode' => 'on',                
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            5 => 
            array (
                'id' => 6,
                'status' => 'suspended',
                'table' => 'users',
                'mode' => 'on',                
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            6 => 
            array (
                'id' => 7,
                'status' => 'deleted',
                'table' => 'users',
                'mode' => 'on',                
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),            

        ));
    }
}