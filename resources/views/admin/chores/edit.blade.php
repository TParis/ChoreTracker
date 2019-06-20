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
    {{ Form::open(array('route' => array('updateChore', $chore->id), 'method' => 'put', 'class'	=> 'form-horizontal')) }}
      <div class="panel-heading">
        <h2>Edit Chore</h2>
      </div>
      <div class="panel-body">
        <div class="form-group">
          {{ Form::label('name', 'Chore', array('class' => 'col-sm-2 control-label')) }}
          <div class="col-sm-10">
            {{ Form::text('name', $chore->name, array('class' => 'form-control', 'placeholder' => 'Clean')) }}
          </div>
        </div>
        <div class="form-group">
          {{ Form::label('points', 'Points', array('class' => 'col-sm-2 control-label')) }}
          <div class="col-sm-10">
            {{ Form::text('points', $chore->points, array('class' => 'form-control', 'placeholder' => '0')) }}
          </div>
        </div>
        <div class="form-group">
          {{ Form::label('location', 'Location', array('class' => 'col-sm-2 control-label')) }}
          <div class="col-sm-10">
            {{ Form::text('location', $chore->location, array('class' => 'form-control', 'placeholder' => 'Bedroom')) }}
          </div>
        </div>
        <div class="form-group">
          {{ Form::label('description', 'Description', array('class' => 'col-sm-2 control-label')) }}
          <div class="col-sm-10">
            {{ Form::textarea('description', $chore->description, array('class' => 'form-control', 'placeholder' => 'Description')) }}
          </div>
        </div>
        <div class="form-group">
          {{ Form::label('kids[]', 'Kids', array('class' => 'col-sm-2 control-label')) }}
          <div class="col-sm-10">
            {{ Form::select('kids[]', $kids, json_decode($chore->kids), array('multiple' => 'multiple', 'class' => 'form-control')) }}
          </div>
        </div>
        <div class="form-group">
          {{ Form::label('daysOfWeek[]', 'Days', array('class' => 'col-sm-2 control-label')) }}
          <div class="col-sm-10">
            {{ Form::select('daysOfWeek[]', $days, json_decode($chore->daysOfWeek), array('multiple' => 'multiple', 'class' => 'form-control')) }}
          </div>
        </div>
        <div class="form-group">
          {{ Form::label('repeatable', 'Repeatable', array('class' => 'col-sm-2 control-label')) }}
          <div class="col-sm-10">
            {{ Form::checkbox('repeatable', 1, $chore->repeatable, array('class' => 'form-control')) }}
          </div>
        </div>
        <div class="form-group">
          {{ Form::label('exclusive', 'Exclusive', array('class' => 'col-sm-2 control-label')) }}
          <div class="col-sm-10">
            {{ Form::checkbox('exclusive', 1, $chore->exclusive, array('class' => 'form-control')) }}
          </div>
        </div>
      </div>
      <div class="panel-footer">
        <a href="{{ url('/admin') }}" class="btn btn-danger"><i class="fa fa-stop-circle"></i> Cancel</a>
        <button type="submit" class="btn btn-success pull-right"><i class="glyphicon glyphicon-pencil"></i> Update</button>
      </div>
    {{ Form::close() }}
  </div>
@endsection
