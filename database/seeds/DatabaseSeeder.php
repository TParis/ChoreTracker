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
      $this->call(kidsTableSeeder::class);
      $this->call(choresTableSeeder::class);
      $this->call(dailyChoresTableSeeder::class);
    }
}
