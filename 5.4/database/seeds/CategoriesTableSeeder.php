<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Aerospace',
                'slug' => 'Aerospace',
                'mode' => 'on',
                'image' => 'default.jpg',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Artificial Intelligence',
                'slug' => 'Artificial Intelligence',
                'mode' => 'on',
                'image' => 'default.jpg',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Agriculture',
                'slug' => 'Agriculture',
                'mode' => 'on',
                'image' => 'default.jpg',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Biotech',
                'slug' => 'Biotech',
                'mode' => 'on',
                'image' => 'default.jpg',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Business Services',
                'slug' => 'Business Services',
                'mode' => 'on',
                'image' => 'default.jpg',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Data Analytics',
                'slug' => 'Data Analytics',
                'mode' => 'on',
                'image' => 'default.jpg',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Digital Media',
                'slug' => 'Digital Media',
                'mode' => 'on',
                'image' => 'default.jpg',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Ecommerce',
                'slug' => 'Ecommerce',
                'mode' => 'on',
                'image' => 'default.jpg',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Education',
                'slug' => 'Education',
                'mode' => 'on',
                'image' => 'default.jpg',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Energy',
                'slug' => 'Energy',
                'mode' => 'on',
                'image' => 'default.jpg',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'FinTech',
                'slug' => 'FinTech',
                'mode' => 'on',
                'image' => 'default.jpg',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Food & Drink',
                'slug' => 'Food & Drink',
                'mode' => 'on',
                'image' => 'default.jpg',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Gaming',
                'slug' => 'Gaming',
                'mode' => 'on',
                'image' => 'default.jpg',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Hardware',
                'slug' => 'Hardware',
                'mode' => 'on',
                'image' => 'default.jpg',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Healthcare',
                'slug' => 'Healthcare',
                'mode' => 'on',
                'image' => 'default.jpg',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Internet',
                'slug' => 'Internet',
                'mode' => 'on',
                'image' => 'default.jpg',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'IoT',
                'slug' => 'IoT',
                'mode' => 'on',
                'image' => 'default.jpg',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'Life Sciences',
                'slug' => 'Life Sciences',
                'mode' => 'on',
                'image' => 'default.jpg',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'Marketing',
                'slug' => 'Marketing',
                'mode' => 'on',
                'image' => 'default.jpg',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'Media & Entertainment',
                'slug' => 'Media & Entertainment',
                'mode' => 'on',
                'image' => 'default.jpg',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'Mobile',
                'slug' => 'Mobile',
                'mode' => 'on',
                'image' => 'default.jpg',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'Other',
                'slug' => 'Other',
                'mode' => 'on',
                'image' => 'default.jpg',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'Real Estate',
                'slug' => 'Real Estate',
                'mode' => 'on',
                'image' => 'default.jpg',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'Recruitment',
                'slug' => 'Recruitment',
                'mode' => 'on',
                'image' => 'default.jpg',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'Retail',
                'slug' => 'Retail',
                'mode' => 'on',
                'image' => 'default.jpg',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'Robotics',
                'slug' => 'Robotics',
                'mode' => 'on',
                'image' => 'default.jpg',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'SaaS',
                'slug' => 'SaaS',
                'mode' => 'on',
                'image' => 'default.jpg',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'Security',
                'slug' => 'Security',
                'mode' => 'on',
                'image' => 'default.jpg',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'Social Impact',
                'slug' => 'Social Impact',
                'mode' => 'on',
                'image' => 'default.jpg',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'Software',
                'slug' => 'Software',
                'mode' => 'on',
                'image' => 'default.jpg',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'Sports',
                'slug' => 'Sports',
                'mode' => 'on',
                'image' => 'default.jpg',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'Sustainability',
                'slug' => 'Sustainability',
                'mode' => 'on',
                'image' => 'default.jpg',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'Technology',
                'slug' => 'Technology',
                'mode' => 'on',
                'image' => 'default.jpg',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            33 => 
            array (
                'id' => 34,
                'name' => 'Telecommunications',
                'slug' => 'Telecommunications',
                'mode' => 'on',
                'image' => 'default.jpg',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            34 => 
            array (
                'id' => 35,
                'name' => 'Tourism',
                'slug' => 'Tourism',
                'mode' => 'on',
                'image' => 'default.jpg',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            35 => 
            array (
                'id' => 36,
                'name' => 'Transportation',
                'slug' => 'Transportation',
                'mode' => 'on',
                'image' => 'default.jpg',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            36 => 
            array (
                'id' => 37,
                'name' => 'Virtual Reality',
                'slug' => 'Virtual Reality',
                'mode' => 'on',
                'image' => 'default.jpg',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            37 => 
            array (
                'id' => 38,
                'name' => 'Wearables',
                'slug' => 'Wearables',
                'mode' => 'on',
                'image' => 'default.jpg',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
        ));
        
        
    }
}