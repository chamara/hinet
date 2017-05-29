<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSettingsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(DocumentsTableSeeder::class);
        $this->call(InvestmentsTableSeeder::class);
        $this->call(PagesTableSeeder::class);
        $this->call(PasswordResetsTableSeeder::class);
        $this->call(StartupsTableSeeder::class);
        $this->call(TeamsTableSeeder::class);
        $this->call(UpdatesTableSeeder::class);
        $this->call(UsersTableSeeder::class);        
    }
}
