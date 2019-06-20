@extends('admin.layout')

@section('subcontent')
  @if(Session::has('success'))
  <div class="alert alert-success">{{ Session::get('success') }}</div>
  @endif
  @if(Session::has('error'))
  <div class="alert alert-danger">{{ Session::get('error') }}</div>
  @endif
  @if (count($errors))
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  <div class="panel panel-default">
    {{ Form::open(array('route' => array('grantPoints'), 'method' => 'put', 'class'	=> 'form-horizontal')) }}
      <div class="panel-heading">
        <h2>Give Points</h2>
      </div>
      <div class="panel-body">
        <div class="form-group">
          {{ Form::label('kid', 'Kids', array('class' => 'col-sm-2 control-label')) }}
          <div class="col-sm-10">
            {{ Form::select('kid', $kids, [], array('class' => 'form-control')) }}
          </div>
        </div>
        <div class="form-group">
          {{ Form::label('points', 'Points', array('class' => 'col-sm-2 control-label')) }}
          <div class="col-sm-10">
            {{ Form::text('points', 0, array('class' => 'form-control', 'placeholder' => '0')) }}
          </div>
        </div>

        <div class="panel-footer">
          <a href="{{ url('/admin') }}" class="btn btn-danger"><i class="fa fa-stop-circle"></i> Cancel</a>
          <button type="submit" class="btn btn-success pull-right"><i class="glyphicon glyphicon-pencil"></i> Submit</button>
        </div>
    {{ Form::close() }}
  </div>
@endsection
