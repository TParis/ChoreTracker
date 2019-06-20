<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kids;
use App\awards;
use App\chores;
use App\dailyChores;
use Carbon\Carbon;

class DailyChoresController extends Controller
{
    public function show()
    {
        $kids = kids::all();
        $todaysChores = kids::with(['chores' => function($query) {
          $query->where('date', '=', Carbon::now('America/Chicago')->toDateString());
        }])->get();

        return view('home', compact('todaysChores', 'kids'));
    }

    public function admin()
    {

      $chores = chores::all();
      $awards = awards::all();

      return view('admin.home', compact('kids', 'chores','awards'));

    }


    public static function clearDailyChores()
    {
      // Gather daily chores
      $chores = dailyChores::where('date', '=', Carbon::now('America/Chicago')->toDateString())->delete();

      return redirect()->back();
    }

    public static function loadDailyChores()
    {
      // Do not run if already has chores loaded
      if (dailyChores::where('date', '=', Carbon::now('America/Chicago')->toDateString())->get()->isEmpty()) {
        echo "Loading today's chores.\n";
        // Get today's chores
        chores::all()->filter(function ($chore, $key) {
          return in_array(Carbon::now()->dayOfWeek, json_decode($chore->daysOfWeek));
        // Interate through today's chores
        })->each(function ($chore, $key) {
          global $choresCount;
          echo "Found chore: " . $chore->name . ".\n";
          // For each kid
          foreach (json_decode($chore->kids) as $kid_id) {
            $kid = kids::find($kid_id);
            if (in_array($kid->id, json_decode($chore->kids))) {
              $dailyChore = [
                'date'        => Carbon::now('America/Chicago')->toDateString(),
                'kid_id'      => $kid->id,
                'name'        => $chore->name,
                'description' => $chore->description,
                'location'    => $chore->location,
                'points'      => $chore->points,
                'repeatable'  => $chore->repeatable,
                'exclusive'   => $chore->exclusive,
                'chore_id'    => $chore->id,
              ];
              $dailyChore = new dailyChores($dailyChore);
              $dailyChore->save();
              echo "Loaded chore: " . $chore->name . " on " . $kid->name . ".\n";
            }
          }

        });
        return (app()->runningInConsole()) ? 1 : redirect()->back();
      } else {
        echo "Chores already loaded for today.\n";
        return (app()->runningInConsole()) ? 0 : redirect()->back();
      }

    }

    public function complete(dailyChores $chore) {

      if (!$chore->complete) {
        $kid = kids::find($chore->kid_id);
        $kid->points += $chore->points;
        $kid->save();
        $chore->complete = 1;
        $chore->save();

        #Exclusive Chores
        if ($chore->exclusive) {
          dailyChores::where('chore_id', $chore->chore_id)
              ->where('date', $chore->date)
              ->where('complete', 0)
              ->delete();
        }

        #Repeatable Chores
        if ($chore->repeatable) {
          $copy = $chore->replicate();
          $copy->complete = 0;
          $copy->push();
        }

        return "1";

      } else {

        return "0";

      }

    }

    public function listDates() {

      $today = Carbon::now();

      $dates = [
        $today->toDateString(),
        $today->subDay()->toDateString(),
        $today->subDay(2)->toDateString(),
        $today->subDay(3)->toDateString(),
        $today->subDay(4)->toDateString(),
        $today->subDay(5)->toDateString(),
        $today->subDay(6)->toDateString()
      ];

      return view('admin.chores.undo', compact('dates'));

    }

    public function listChoresByDate(Carbon $date) {

      return dailyChores::where('date', $date->toDateString())->get();

    }

    public function undo(dailyChores $chore) {

      //Remove points
      $kid = kids::find($chore->kid_id);
      $kid->points -= $chore->points;
      $kid->save();

      //Exclusive
      if ($chore->exclusive) {
        foreach (kids::all() as $kid) {
          if ($kid->id != $chore->kid_id) {
            $dailyChore = [
              'date'        => $chore->date,
              'kid_id'      => $kid->id,
              'name'        => $chore->name,
              'description' => $chore->description,
              'location'    => $chore->location,
              'points'      => $chore->points,
              'repeatable'  => $chore->repeatable,
              'exclusive'   => $chore->exclusive,
              'chore_id'    => $chore->chore_id,
            ];
            $dailyChore = new dailyChores($dailyChore);
            $dailyChore->save();
          }
        }
      }

      //Undo complete
      $chore->complete = 0;
      $chore->save();

    }
}
