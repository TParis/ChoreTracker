<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\awards;
use App\kids;
use Validator;
use Illuminate\Support\Facades\Session;

class AwardsController extends Controller
{
    public function redeem(kids $kid) {
      $awards = awards::all();
      return view('awards.redeem', compact('awards', 'kid'));
    }

    public function pick(kids $kid, awards $award) {
      if ($kid->points < $award->points) {
        return view('awards.insufficient');
      } else {
        return view('awards.confirm', compact('kid', 'award'));
      }
    }
    public function grant(Request $request, kids $kid, awards $award) {
      if ($kid->code == $request->code) {
        $kid->points -= $award->points;
        $kid->save();
        mail('tparis00ap@hotmail.com', 'Award Redemption', $kid->name . " has redeemed " . $award->name);
        //TO DO: LOG THIS just in case I dont get the email or lose it
        return view('awards.redeemed', compact('award'));
      } else {
        return view('awards.badcode');
      }
    }

    public function edit(awards $award) {
      return view('admin.awards.edit', compact('award'));
    }

    public function add() {
      return view('admin.awards.add');
    }

    public function delete(awards $award) {
      Session::flash('success', $award->name . ' has been deleted successfully.');
      $award->delete();
      return redirect('/admin');
    }

    public function update(Request $request, awards $award) {
      $this->validate($request, [
        'name'          =>	'required|string|min:3|max:255',
        'points'        =>	'required|integer',
      ]);

      $award->name = $request->name;
      $award->points = $request->points;

      $award->save();

      Session::flash('success', $award->name . ' has been updated successfully.');

      return redirect('/admin');
    }

    public function create(Request $request) {

      $this->validate($request, [
        'name'          =>	'required|string|min:3|max:255',
        'points'        =>	'required|integer',
      ]);

      $newAward = [
        'name'     => $request->name,
        'points'      => $request->points,
      ];

      $newAward = new awards($newAward);
      $newAward->save();

      Session::flash('success', $newAward->name . ' has been created successfully.');

      return redirect('/admin');

    }

}
