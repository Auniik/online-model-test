<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::query()->truncate();
        \App\User::query()->insert([
           [
               'name' => 'tekasaibd',
               'image' => 'user-image/DSC_4901.JPG',
               'email' => 'tekasai100@gmail.com',
               'password'=> '$2y$10$CL/JGYR1NuMMwv/ukJ6unuMxShl6k1Gspl5eYsENIdvdPg89ar/Xq',
               'role' => 'admin',
               'created_at' => now(),
               'updated_at' => now()
           ],
            [
                'name' => 'tekasaibd',
                'image' => 'user-image/DSC_4901.JPG',
                'email' => 'tekasai1000@gmail.com',
                'password'=> '$2y$10$g/O4uPEHghyTHu9PxNqeZet4oKMP4gIdS6mvaxVvn3PRedrYHOAqm',
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
