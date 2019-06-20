@extends('layout')

@section('content')

<div class="col-md-6 col-md-offset-3">
    <h3>Hello {{ $kid->name}}, you have {{$kid->points}} points to spend.</h3>
    <h3>Do your really want to redeem {{$award->name}} for {{$award->points}} points?  If you do, <b>you'll only have {{$kid->points - $award->points}} left.</b></h3>
    <h3>Enter your code to redeem:</h3>

    {{ Form::open(array('route' => array('grantAward', $kid->id, $award->id), 'method' => 'post', 'class'	=> 'form-horizontal')) }}
    <input type="password" style="font-size:20px; line-height: 20px; height: 30px; width: 400px;" class="form-control" name="code">&nbsp;<input type="submit" class="form-control" style="width: 150px; height: 30px;" value="Redeem">
    {{ Form::close() }}
    <h3><a href="/">Or click here to cancel</a></h3>
  </div>
@endsection
