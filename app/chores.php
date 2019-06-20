<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\kids;

class chores extends Model
{

    protected $fillable = ['kids', 'daysOfWeek', 'name', 'description', 'location', 'points', 'exclusive', 'repeatable'];

    public function kids() {
        $kids = kids::whereIn('id', json_decode($this->kids))->pluck('name')->all();

        return implode(', ', $kids);

    }

    public function daysOfTheWeek() {

      $days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

      foreach ($days as $key => $day) {
        if (!in_array($key, json_decode($this->daysOfWeek))) {
          unset($days[$key]);
        }
      }

      return implode(', ', $days);
    }
}
