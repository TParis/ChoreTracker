<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kids extends Model
{

      protected $fillable = ['name', 'age', 'birthday', 'photo','code'];

      public function chores() {
        return $this->hasMany('App\dailyChores', 'kid_id');
      }
} 
