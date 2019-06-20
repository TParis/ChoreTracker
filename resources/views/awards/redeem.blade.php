@extends('layout')

@section('content')
<div class="col-md-6 col-md-offset-3">
    <h3>Hello {{ $kid->name}}, you have {{$kid->points}} points to spend.</h3>
    <table class="table table-bordered table-striped table-hover">
      <thead>
        <tr>
          <th>Award</th>
          <th>Points</th>
        </tr>
      </tead>
      <tbody>
        @foreach ($awards as $award)
        <tr>
          <td><a href="{{ route('pickAward', array('kid' => $kid->id, 'award' => $award->id)) }}">{{ $award->name }}</td>
          <td>{{ $award->points }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <h3><a href="/">Back</a></h3>
</div>
