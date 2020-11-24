<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Category::create([
          'name'=>'Category 1',
          'slug'=>'Category 1',
        ]);
        \App\Category::create([
          'name'=>'Category 2',
          'slug'=>'Category 2',
        ]);
        \App\Category::create([
          'name'=>'Category 3',
          'slug'=>'Category 3',
        ]);
        \App\Category::create([
          'name'=>'Category 4',
          'slug'=>'Category 4',
        ]);
    }
}
