<?php

use Illuminate\Database\Seeder;

class SocialNetworksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('social_networks')->delete();
        
        \DB::table('social_networks')->insert(array (
            0 => 
            array (
                'id' => 1,
                'social_network' => 'Facebook',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            1 => 
            array (
                'id' => 2,
                'social_network' => 'Twitter',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            2 => 
            array (
                'id' => 3,
                'social_network' => 'LinkedIn',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            3 => 
            array (
                'id' => 4,
                'social_network' => 'Instagram',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            4 => 
            array (
                'id' => 5,
                'social_network' => 'Google+',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            5 => 
            array (
                'id' => 6,
                'social_network' => 'AngelList',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
        ));
    }
}