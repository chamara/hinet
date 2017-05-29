<?php

use Illuminate\Database\Seeder;

class DocumentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('documents')->delete();
        
        \DB::table('documents')->insert(array (
            0 => 
            array (
                'id' => 1,
                'filename' => 'Cashflow',
                'startups_id' => 1,
                'path' => 'cashflow-sfc-jti1d.xlsx',
                'type' => 'xlsx',
                'filesize' => '1.47',
                'token_id' => '6KXMQLQch4rwPjwjNfSXCc1ucYBzGX09DTNVIJ3PyyJaMCckOM8cRQ91gRgGAGK4ktHsC7G0ZQQbcs8H5hZwDs9Lixw592nAOjA6gbImSZEGKjPbIvmcOWwNymHAmS6xAHK0azpy4PyenNuaa7I9uZz0AEoQfX9pmj897xsQc1UyIiDdzhmZOKjUjxZeDKjWWDVkiyRe',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            1 => 
            array (
                'id' => 2,
                'filename' => 'Pitchdeck',
                'startups_id' => 1,
                'path' => 'pitchdeck-sfc-9hep7.pdf',
                'type' => 'pdf',
                'filesize' => '10.07',
                'token_id' => 'lCnDo0tf3ij41Mca1amL1uIsRtAHPHTyz0QEMk2G1a6xNW0IvyehgVisBvCYHgfKIYygzT4U5AyILJTUZ3tCjXQrCJ9dahUZ25PRTtselXTih9daNrXllXcrltoWyj21ZJYxiSUhYdxRq0t81llf5y1xMoLUaj2RzhMkmsNiHIhpey3bcR1zI8jBw2d7keiG1Pq7mggu',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            2 => 
            array (
                'id' => 3,
                'filename' => 'Pitchdeck',
                'startups_id' => 2,
                'path' => 'pitchdeck-sfc-9amux.pdf',
                'type' => 'pdf',
                'filesize' => '2.13',
                'token_id' => 'k6S0ffeqgwljdfLyDHvFeBOsze1czUKMxZw3RiCQqOpHDEJoxgk57CunnTBycoxEycxukhPULh6uRg0eKC6PUvjiEOEevfc7yDyTXWQazsSKn1F5SzQfcEZra5g0gu7UvSMPSu96DfBJNnsIwnNrEnL9SK20lHbPW9qbr4me9Ybnxj0tLupYjYHKXzh4S8OTL4Blc95q',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            3 => 
            array (
                'id' => 4,
                'filename' => 'Pitchdeck',
                'startups_id' => 3,
                'path' => 'pitchdeck-sfc-q86br.pdf',
                'type' => 'pdf',
                'filesize' => '3.41',
                'token_id' => 'SwgZogUPtFOsQqlPMuBE8GiEFwDvfFD7aTOha99ZrzkmOBYP1Irnm0t80fFm880FVN4C0WjFslSzY8TiOBLUfByFiXhy8bPcvcuo4en4kQZsmNl8lhaAVYibRY3x8qWZGzJaOIy6iqQWmk9uXwPjTfmTNQMayO7upshryQiEyzvosdRqMpMrVPYfF4plEpvGkAYQvW4o',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
        ));
        
        
    }
}