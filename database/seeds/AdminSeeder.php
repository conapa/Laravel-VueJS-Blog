<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\User::create([
          'name'=>'ana admin',
          'email'=>'admin@gmail.com',
          'password'=>bcrypt('adminadmin'),
          'profile_img'=>'profile_img1.jpg',
          'is_admin'=>true
      ]);
    }
}
