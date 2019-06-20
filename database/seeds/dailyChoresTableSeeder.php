<?php

use Illuminate\Database\Seeder;

class dailyChoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dailyChores')->insert([
          'kid_id' => 1,
          'date' => '2017-04-15',
          'name' => "Clean Room",
          'description' => "Pick up all of the toys on your floor, make your bed, and throw away any trash.  Then bring all the dishes downstairs.",
          'location' => "Your bedroom",
          'complete' => 0,
        ]);
        DB::table('dailyChores')->insert([
          'kid_id' => 1,
          'date' => '2017-04-15',
          'name' => "Read",
          'description' => "Read for 10 minutes in your room.",
          'location' => "Your bedroom",
          'complete' => 0,
        ]);
        DB::table('dailyChores')->insert([
          'kid_id' => 2,
          'date' => '2017-04-15',
          'name' => "Clean Room",
          'description' => "Pick up all of the toys on your floor, make your bed, and throw away any trash.  Then bring all the dishes downstairs.",
          'location' => "Your bedroom",
          'complete' => 0,
        ]);
        DB::table('dailyChores')->insert([
          'kid_id' => 2,
          'date' => '2017-04-15',
          'name' => "Read",
          'description' => "Read for 10 minutes in your room.",
          'location' => "Your bedroom",
          'complete' => 0,
        ]);
    }
}
