<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('questions')->delete();
        
        \DB::table('questions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'question' => 'Describe the problem you are solving?',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            1 => 
            array (
                'id' => 2,
                'question' => 'How does your product/service solve this problem?',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            2 => 
            array (
                'id' => 3,
                'question' => 'Who is your target market?',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            3 => 
            array (
                'id' => 4,
                'question' => 'What is your business model?',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            4 => 
            array (
                'id' => 5,
                'question' => 'What is your current traction?',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            5 => 
            array (
                'id' => 6,
                'question' => 'Who are your main competitors?',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            6 => 
            array (
                'id' => 7,
                'question' => 'Provide a management team summary',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            7 => 
            array (
                'id' => 8,
                'question' => 'Please provide a breakdown of use of funds',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            8 => 
            array (
                'id' => 9,
                'question' => 'What are your key strengths?',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            9 => 
            array (
                'id' => 10,
                'question' => 'What are your biggest weaknesses?',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            10 => 
            array (
                'id' => 11,
                'question' => 'Why did you start the company? What excites you about it?',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
    ));

    }
}