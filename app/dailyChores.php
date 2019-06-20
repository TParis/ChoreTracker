<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dailyChores extends Model
{

    protected $table = 'dailyChores';
    protected $fillable = ['kid_id', 'date', 'name', 'description', 'location', 'points', 'exclusive', 'repeatable', 'chore_id'];

    public function kid() {
      return $this->belongsTo('App\kids', 'kid_id', 'id');
    }
}
