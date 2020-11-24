<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
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
          'name'=>'youness benssassi',
          'email' =>'benssassi@gmail.com',
          'password' =>bcrypt('newxaw05'),
          'profile_img' => 'profile_img.png',

        ]);
    }
}
