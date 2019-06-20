@extends('layout')

@section('content')
<h2 align="center">Chore Tracker</h2>

<div class="col-md-2">
  <div class="list-group">
    <a href="{{ url('admin') }}" class="list-group-item">Home</a>
    <a href="{{ route('addChore') }}" class="list-group-item">Add Chores</a>
    <a href="{{ route('addAward') }}" class="list-group-item">Add Awards</a>
    <a href="{{ route('givePoints') }}" class="list-group-item">Give Points</a>
    <a href="{{ route('addKid') }}" class="list-group-item">Add Kid</a>
    @inject('people', 'App\kids')
    @foreach ($people::all() as $kid)
    <a href="{{ route('editKid', $kid->id) }}" class="list-group-item">Edit {{ $kid->name }}</a>
    @endforeach
    <a href="{{ route('load') }}" class="list-group-item">Load Daily Chores</a>
    <a href="{{ route('clear') }}" class="list-group-item list-group-item-danger">Clear Chores</a>
  </div>
</div>
<div class="col-md-10">
  @yield('subcontent')
</div>
@endsection
