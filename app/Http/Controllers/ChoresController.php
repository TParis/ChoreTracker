<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\chores;
use App\kids;
use Validator;
use Illuminate\Support\Facades\Session;

class ChoresController extends Controller
{
    public function edit(chores $chore) {
      $kids = kids::pluck('name', 'id')->all();
      $days = $this->days();
      return view('admin.chores.edit', compact('chore', 'kids', 'days'));
    }

    public function add() {
      $kids = kids::pluck('name', 'id')->all();
      $days = $this->days();
      return view('admin.chores.add', compact('kids', 'days'));
    }

    public function update(Request $request, chores $chore) {
			$this->validate($request, [
				'name'          =>	'required|string|min:3|max:255',
				'kids'          =>	'required|array',
				'daysOfWeek'		=>	'required|array',
				'points'        =>	'required|integer',
				'description'   =>	'required|string|min:5|max:2048',
				'location'      =>	'required|string|min:5|max:255',
			]);

      $chore->name = $request->name;
      $chore->kids = json_encode($request->kids);
      $chore->daysOfWeek = json_encode($request->daysOfWeek);
      $chore->points = $request->points;
      $chore->description = $request->description;
      $chore->location = $request->location;
      $chore->repeatable = ($request->repeatable) ? 1 : 0;
      $chore->exclusive = ($request->exclusive) ? 1 : 0;

      $chore->save();

      Session::flash('success', $chore->name . ' has been updated successfully.');

      return redirect('/admin');
    }

    public function create(Request $request) {

      $this->validate($request, [
				'name'          =>	'required|string|min:5|max:255',
				'kids'          =>	'required|array',
				'daysOfWeek'		=>	'required|array',
				'points'        =>	'required|integer',
				'description'   =>	'required|string|min:5|max:2048',
				'location'      =>	'required|string|min:5|max:255',
			]);

      $newChore = [
        'name'        => $request->name,
        'kids'        => json_encode($request->kids),
        'daysOfWeek'  => json_encode($request->daysOfWeek),
        'points'      => $request->points,
        'description' => $request->description,
        'location'    => $request->location,
        'repeatable'  => ($request->repeatable) ? 1 : 0,
        'exclusive'   => ($request->exclusive) ? 1 : 0,
      ];

      $newChore = new chores($newChore);
      $newChore->save();

      Session::flash('success', $newChore->name . ' has been created successfully.');

      return redirect('/admin');

    }

    public function days() {
      return ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
    }
}
