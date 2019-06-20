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
    {{ Form::open(array('route' => array('submitAward'), 'method' => 'post', 'class'	=> 'form-horizontal')) }}
      <div class="panel-heading">
        <h2>Add Award</h2>
      </div>
      <div class="panel-body">
        <div class="form-group">
          {{ Form::label('name', 'Name', array('class' => 'col-sm-2 control-label')) }}
          <div class="col-sm-10">
            {{ Form::text('name', '', array('class' => 'form-control', 'placeholder' => 'Movie of your choice')) }}
          </div>
        </div>
        <div class="form-group">
          {{ Form::label('points', 'Points', array('class' => 'col-sm-2 control-label')) }}
          <div class="col-sm-10">
            {{ Form::text('points', 100, array('class' => 'form-control', 'placeholder' => '100')) }}
          </div>
        </div>
      </div>
      <div class="panel-footer">
        <a href="{{ url('/admin') }}" class="btn btn-danger"><i class="fa fa-stop-circle"></i> Cancel</a>
        <button type="submit" class="btn btn-success pull-right"><i class="glyphicon glyphicon-pencil"></i> Submit</button>
      </div>
    {{ Form::close() }}
  </div>
@endsection
