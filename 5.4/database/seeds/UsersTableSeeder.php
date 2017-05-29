<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Daniel Tait',
                'countries_id' => '1',
                'password' => '$2y$10$eAMKLcKxjtSHkSKuvGIpZeS7nHCPhdo88qn4qBrT3P5PN8dwABP8G',
                'email' => 'admin@startupfundingclub.com',
                'avatar' => '11491342072qzpjasbzac1nwxw.jpg',
                'status' => 'active',
                'role' => 'admin',
                'remember_token' => 'MrHmxpVE4NJkFGoDQeLPHVwmBVQJxQDmyLmkPA15mZOqHx6yVBR720EOxXYC',
                'token' => 'Wy4VkAl2dxHb9WHoXjTowSGPXFPnEQHca6RBe2yeqqmRafs0hSbCEobhNkZZAbCDIru60ceLzAAOI3fj',
                'confirmation_code' => '',
                'payment_gateway' => '',
                'bank' => '',
                'created_at' => '2017-05-29 06:32:52',
                'updated_at' => '2017-05-29 06:32:52',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'David Maxwell',
                'countries_id' => '1',
                'password' => '$2y$10$Lb35snFQGOl25DEYn3/kQOf9HMA0YFkX5BoY5nIIEheGnSEDM0A/K',
                'email' => 'intupod@startupfundingclub.com',
                'avatar' => '121492988186b9fvw3nsqcscpgn.jpg',
                'status' => 'active',
                'role' => 'startup',
                'remember_token' => 'LqqMQQb4sZnm0LSVxlwWZ6elsPVYgTUUmawlJEEKSQd1mWScmXN7cTmz9nar',
                'token' => 'j7Uwtr1JckVVZfc4S7agpQNWnU3aPWP5c2RUnFPUXqBxPVkKbXj0Frsy1LIEiVnaeFbccgo11ml',
                'confirmation_code' => '',
                'payment_gateway' => '',
                'bank' => '',
                'created_at' => '2017-05-29 06:32:52',
                'updated_at' => '2017-05-29 06:32:52',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Peter Bradley',
                'countries_id' => '1',
                'password' => '$2y$10$g35Q0zpvz26wNuTA59eBees/vC74sr7CE9YSqqq6ZjF04JdPispVq',
                'email' => 'torsion@startupfundingclub.com',
                'avatar' => '151493037213zmpmoiy0hjl4yqg.jpg',
                'status' => 'active',
                'role' => 'startup',
                'remember_token' => '5uRsffM0TROSOFghuAUqYiqBrHB6GL7O1aVNx4cwImJ6FoUpH1jE3ydQOaud',
                'token' => 't8fRL2ISZEfjf5ZqeMWVCLD7PnJDcxlWcL6Buh3GuBF3p7jUTVF4aCyQ9Me8MQSf3PC9ptYHa9k',
                'confirmation_code' => '',
                'payment_gateway' => '',
                'bank' => '',
                'created_at' => '2017-05-29 06:32:52',
                'updated_at' => '2017-05-29 06:32:52',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Chris Ball',
                'countries_id' => '1',
                'password' => '$2y$10$PeI71g/4pDO1zJGvI7txt.ZZeghg.RjPpvd8LS01COVXuxHWl9cHG',
                'email' => 'jupiter@startupfundingclub.com',
                'avatar' => '161493037953duskuj3btdwibsv.jpg',
                'status' => 'active',
                'role' => 'startup',
                'remember_token' => 'nSZgaI546EuCHfipJWFpTl6Gv8oRfa7Pogfe1Ks2gPcLt1VMvgjwwijsjMjW',
                'token' => 'FI50sRATTP0BdgiUOpWrackvUWuEaZGuj5h5O1ryRhPnszgOHRjXN5nARZr3dTGr9AvrPCUfHul',
                'confirmation_code' => '',
                'payment_gateway' => '',
                'bank' => '',
                'created_at' => '2017-05-29 06:32:52',
                'updated_at' => '2017-05-29 06:32:52',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Mark Cuban',
                'countries_id' => '1',
                'password' => '$2y$10$JxwyZcxRhY4ZztvtjuSa2OyYt6JZeYVqPqFnCNk.98Jpqfka5QWkS',
                'email' => 'investor@startupfundingclub.com',
                'avatar' => '171493038203tzmv2h2yzwc0bni.jpg',
                'status' => 'active',
                'role' => 'investor',
                'remember_token' => 'tzISNgjVcHyHJlb2jtg0c6CcaLmepMa4dzI8NlnNmgqkNZjeBwwftArIt4pm',
                'token' => 'wE5FY1yZtyg12w23IoLfaMS0Cxl0TDWVF0guW12W1QbLIbt3gtLFnQSmp1po4MSvy3y7Sj67XwJ',
                'confirmation_code' => '',
                'payment_gateway' => '',
                'bank' => '',
                'created_at' => '2017-05-29 06:32:52',
                'updated_at' => '2017-05-29 06:32:52',
            ),
        ));
        
        
    }
}