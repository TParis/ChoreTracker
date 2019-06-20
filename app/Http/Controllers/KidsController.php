<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kids;
use Validator;
use Illuminate\Support\Facades\Session;

class KidsController extends Controller
{
  public function edit(kids $kid) {
    return view('admin.kids.edit', compact('kid'));
  }

  public function add() {
    return view('admin.kids.add');
  }

  public function update(Request $request, kids $kid) {
    $this->validate($request, [
      'name'          =>	'required|string|min:0|max:999999',
      'code'          =>	'required|integer|min:0|max:999999',
      'age'           =>	'required|integer',
      'birthday'      =>	'required|date',
      'points'        =>	'integer',
      'photo'         =>	'required|string', // TO DO: Make this work later
    ]);

    $kid->name = $request->name;
    $kid->age = $request->age;
    $kid->code = $request->code;
    $kid->birthday = $request->birthday;
    $kid->photo = $request->photo;
    $kid->points = $request->points;

    $kid->save();

    Session::flash('success', $kid->name . ' has been updated successfully.');

    return redirect('/admin');
  }

  public function create(Request $request) {

    $this->validate($request, [
      'name'          =>	'required|string|min:3|max:255',
      'code'           =>	'required|integer|min:3|max:6',
      'age'           =>	'required|integer',
      'birthday'      =>	'required|date',
      'photo'         =>	'required|string', // TO DO: Make this work later
    ]);

    $newKid = [
      'name'     => $request->name,
      'age'      => $request->age,
      'code'      => $request->code,
      'birthday' => $request->birthday,
      'photo'    => $request->photo,
    ];

    $newKid = new kids($newKid);
    $newKid->save();

    Session::flash('success', $newKid->name . ' has been created successfully.');

    return redirect('/admin');

  }

  public function givePoints()
  {

      $kids = kids::pluck('name', 'id')->all();
      return view('admin.kids.givepoints', compact('kids'));

  }

  public function grantPoints(Request $request)
  {
    $kid = kids::find($request->kid);
    $kid->points += $request->points;

    if ($kid->save())
    {
      Session::flash('success', $request->points . ' points awarded to ' . $kid->name . ' successfully.');
    }
    else
    {
      Session::flash('error', 'Error awarding points to ' . $kid->name);
    }

    return redirect('/admin');

  }
}
