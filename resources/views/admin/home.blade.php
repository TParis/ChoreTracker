@extends('admin.layout')

@section('subcontent')
  	@if(Session::has('success'))
  	<div class="alert alert-success">{{ Session::get('success') }}</div>
  	@endif
  	@if(Session::has('error'))
  	<div class="alert alert-danger">{{ Session::get('error') }}</div>
  	@endif
    <h3 align="center">Chores</h3>
    <table class="table table-striped table-bordered table-hover">
      <thead>
        <tr>
          <th>Chore</th>
          <th>Kids</th>
          <th>Points</th>
          <th>Location</th>
          <th>Days</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($chores as $chore)
        <tr>
          <td><a href="{{ route('editChore', $chore->id) }}">{{ $chore->name }}</a></td>
          <td>{{ $chore->kids() }}</td>
          <td>{{ $chore->points }}</td>
          <td>{{ $chore->location }}</td>
          <td>{{ $chore->daysOftheWeek() }}</td>
        </tr>
        @endforeach
      </tbody>
  </table>
  <h3 align="center">Awards</h3>
  <table class="table table-striped table-bordered table-hover">
    <thead>
      <tr>
        <th>Awards</th>
        <th>Points</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($awards as $award)
      <tr>
        <td><a href="{{ route('editAward', $award->id) }}">{{ $award->name }}</a></td>
        <td>{{ $award->points }}</td>
      </tr>
      @endforeach
    </tbody>
</table>
@endsection
