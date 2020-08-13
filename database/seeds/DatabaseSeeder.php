<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UserTableSeeder::class);
         $this->call(AboutSeeder::class);
         $this->call(ContactTableSeeder::class);
         $this->call(SliderSeeder::class);
         $this->call(TeamMemberSeeder::class);
         $this->call(BangabandhuInfoSeeder::class);
    }
}
