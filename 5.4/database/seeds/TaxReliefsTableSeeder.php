<?php

use Illuminate\Database\Seeder;

class TaxReliefsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('tax_reliefs')->delete();
        
        \DB::table('tax_reliefs')->insert(array (
            0 => 
            array (
                'id' => 1,
                'status' => 'SEIS',
                'mode' => 'on',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            1 => 
            array (
                'id' => 2,
                'status' => 'EIS',
                'mode' => 'on',                
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            2 => 
            array (
                'id' => 3,
                'status' => 'SEIS/EIS',
                'mode' => 'on',                
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            3 => 
            array (
                'id' => 4,
                'status' => "I Don't Know",
                'mode' => 'on',                
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),            
        ));
    }
}