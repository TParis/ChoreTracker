<?php

use Illuminate\Database\Seeder;

class choresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      DB::table('chores')->insert([
        'daysOfWeek' => json_encode(
          array(
            0, 1, 2, 3, 4
          )
        ),
        'kids' => json_encode(
            array(1, 2)
        ),
        'name' => "Do Homework",
        'description' => "You must complete your homework because you have school on Monday",
        'location' => "Dinning Room",
        'points' => 0
      ]);
      DB::table('chores')->insert([
        'daysOfWeek' => json_encode(
          array(
            6, 3
          )
        ),
        'kids' => json_encode(
            array(1, 2)
        ),
        'name' => "Clean Room",
        'description' => "Pick up all of the toys on your floor, make your bed, and throw away any trash.  Then bring all the dishes downstairs.",
        'location' => "Your bedroom",
        'points' => 0
      ]);
      DB::table('chores')->insert([
        'daysOfWeek' => json_encode(
          array(
            1, 3, 5
          )
        ),
        'kids' => json_encode(
            array(1, 2)
        ),
        'name' => "Unload Dishwasher",
        'description' => "Unload the dishwasher and put away the dishes",
        'location' => "Kitchen",
        'points' => 5
      ]);
      DB::table('chores')->insert([
        'daysOfWeek' => json_encode(
          array(
            6
          )
        ),
        'kids' => json_encode(
            array(1, 2)
        ),
        'name' => "Clean your bathroom",
        'description' => "Clean up your bathroom.  Wipe down the sinks, clean up the floor, put clothes in the hamper, and get thr toys out of the tub.",
        'location' => "Your bathroom",
        'points' => 0
      ]);
      DB::table('chores')->insert([
        'daysOfWeek' => json_encode(
          array(
            0, 1, 2, 3, 4, 5,
          )
        ),
        'kids' => json_encode(
            array(1, 2)
        ),
        'name' => "Read",
        'description' => "Read for 10 minutes in your room.",
        'location' => "Your bedroom",
        'points' => 5
      ]);
    }
}
