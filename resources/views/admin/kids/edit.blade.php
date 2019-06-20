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
    {{ Form::open(array('route' => array('updateKid', $kid->id), 'method' => 'put', 'class'	=> 'form-horizontal')) }}
      <div class="panel-heading">
        <h2>Edit Kid</h2>
      </div>
      <div class="panel-body">
        <div class="form-group">
          {{ Form::label('name', 'Name', array('class' => 'col-sm-2 control-label')) }}
          <div class="col-sm-10">
            {{ Form::text('name', $kid->name, array('class' => 'form-control', 'placeholder' => 'John Doe')) }}
          </div>
        </div>
        <div class="form-group">
          {{ Form::label('age', 'Age', array('class' => 'col-sm-2 control-label')) }}
          <div class="col-sm-10">
            {{ Form::text('age', $kid->age, array('class' => 'form-control', 'placeholder' => '10')) }}
          </div>
        </div>
        <div class="form-group">
          {{ Form::label('code', 'Code', array('class' => 'col-sm-2 control-label')) }}
          <div class="col-sm-10">
            {{ Form::text('code', $kid->code, array('class' => 'form-control', 'placeholder' => '1234')) }}
          </div>
        </div>
        <div class="form-group">
          {{ Form::label('points', 'Points', array('class' => 'col-sm-2 control-label')) }}
          <div class="col-sm-10">
            {{ Form::text('points', $kid->points, array('class' => 'form-control', 'placeholder' => '0')) }}
          </div>
        </div>
        <div class="form-group">
          {{ Form::label('birthday', 'Birthday', array('class' => 'col-sm-2 control-label')) }}
          <div class="col-sm-10">
            {{ Form::text('birthday', $kid->birthday, array('class' => 'form-control', 'placeholder' => '2010-10-10')) }}
          </div>
        </div>
        <div class="form-group">
          {{ Form::label('photo', 'Photo', array('class' => 'col-sm-2 control-label')) }}
          <div class="col-sm-10">
            {{ Form::textarea('photo', $kid->photo, array('class' => 'form-control', 'placeholder' => 'something.png')) }}
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
