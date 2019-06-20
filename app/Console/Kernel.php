<?php

namespace App\Console;

use App\Http\Controllers\DailyChoresController as DailyChores;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
        /*$schedule->call(function() {
          DailyChores::loadDailyChores();
        })->dailyAt('14:25')
         ->sendOutputTo("/root/cron-lara.log")
         ->emailOutputTo('tparis00ap@hotmail.com');*/
         $schedule->call(function() {
           DailyChores::loadDailyChores();
         })->dailyAt('04:00');
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
