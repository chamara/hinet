<?php

use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('teams')->delete();
        
        \DB::table('teams')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'David Maxwell',
                'startups_id' => 1,
                'avatar' => 'david maxwell-sfc-cbexo.jpg',
                'title' => 'Co-founder',
            'bio' => 'INTU Global Shelter (IGS) was established in 2015 to provide innovative design solutions to meet housing and shelter needs worldwide. Over the past 18 months the company has developed and prototyped products ready for market. IGS shelter products are designed to be scalable for global impact.',
                'linkedin' => 'https://www.linkedin.com/in/david-maxwell-842a68140/',
                'email' => 'david@startupfundingclub.com',
                'shareholding' => '13.40',
                'token_id' => 'AmQg7DzZBwyxkUUI6Zwv36ywCRz0mit1MYPfhmZSrVtvxh4wGxzlwAXFuap2VFfbAX9IoG1CuYg10ZJeBmIiCnhWGu2ScoTXy8eujvbLxZQ8FB0lBD19kxvsgeKsoGZSo2t9BaqMoJ2lJJF1Zqo4yjmYycTBAswwtAgUer2lLhKUkMAj9EKieoLuJWZK74udTivsDIPH',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Peter Farquharson',
                'startups_id' => 1,
                'avatar' => 'peter farquharson-sfc-7upsn.jpg',
                'title' => 'Co-founder',
                'bio' => 'Pleased to see EBar Initiatives receiving column inches.....
Aberdeen is a fantastic place to be base to start up a firm!',
                'linkedin' => 'https://www.linkedin.com/',
                'email' => 'peter@startupfundingclub.com',
                'shareholding' => '17.50',
                'token_id' => '9xsZ56wkRdMyYNrAY972dQOu8jNtiv4B6deVWCj4R7zpms5VUN1Y6g5cGziuylDsqeHQnIlGa945wD9RmTTGvW1diMV4qtpo1x4uLVfYS7U60Pt5Hf6FJnu1SVqDLP0g6OYb5tk07khham7dWaRgJnCdxaY1pORk1rY6mwgIskYumHKANu41RhafBRuKwcClhCOmIPnf',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Peter Bradley',
                'startups_id' => 2,
                'avatar' => 'peter bradley-sfc-9j2yg.jpg',
                'title' => 'CEO',
                'bio' => 'Peter has spent a career as a consultant, specializing in secure information management. His deep understanding of the nature of information flow and lifecycle in organisations enables him to make a powerful and effective contribution to the information security discussion.',
                'linkedin' => 'https://www.linkedin.com/in/petebradley/',
                'email' => 'peter.bradley@torsionis.com',
                'shareholding' => '85.00',
                'token_id' => 'DJp1Ogo81rYhSj2WnJkqgTR7Hre3GBEHMUQhT6oJgdBXjVdlATEFM88vK36DEM8Ex5DB9JEdzYWAHj2Eatt4Tb4rLXiS1ADyo05crNgTdAtm4k8zD5ZJQ4sSb43XQWYwfuWWJTOGIiwYaRXGlBy52iVvwLofaf0MGYH5cT5kwWiVlmGCAlLInczWmQ1NGJRWkhR4qmmX',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Chris Ball',
                'startups_id' => 3,
                'avatar' => 'chris ball-sfc-vko3j.jpg',
                'title' => 'CEO',
                'bio' => 'Life sciences companies commercialization, management and investment',
                'linkedin' => 'https://www.linkedin.com/in/chris-ball-67274/',
                'email' => 'chris.ball@jupiterdiagnostics.com',
                'shareholding' => '35.00',
                'token_id' => 'zo8jpIPfXfUEkX49G7V0ojMCddZwn62KCSOzUrsCdytLXOSCPZCMSSJY6LszjbJozM2nuWMW45VPC6I9PzpzjgzwI4Se0MDztS5S0rwHxmBdk1H0H7zvEWEtNQ8YcLRzMTNUni79zdYISnPb1fjZ7pAlLNxMekhiLUf1x5xL687v4SCtGK6sYn3qCeW25HagkK4zQy5e',
                'created_at' => '2017-05-29 06:06:48',
                'updated_at' => '2017-05-29 06:06:48',
            ),
        ));
        
        
    }
}