<?php

use Illuminate\Database\Seeder;

class kidsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kids')->insert([
          'name' => "Jimmy",
          'age' =>  10,
          'birthday'  =>  '2007-10-10',
          'photo' => 'nophotoyet.png'
        ]);
        DB::table('kids')->insert([
          'name' => "Susie",
          'age' =>  7,
          'birthday'  =>  '2010-05-05',
          'photo' => 'nophotoyet.png'
        ]);
    }
}
