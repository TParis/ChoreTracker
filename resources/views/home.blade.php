@extends('layout')

@section('content')
  <div class="container">
    <div class="row">
      @foreach ($kids as $kid)
        <span>{{$kid->name}}: <a href="{{ route('redeem', $kid->id) }}">{{ $kid->points }} points</a>&nbsp;&nbsp;&nbsp;
      @endforeach
    </div>
    <div class="row">
        @foreach ($todaysChores as $kid)
        <div class="col-xs-6 col-sm-6 col-md-6">
          <h3 align="center">{{ $kid->name }}</h3>
          <div class="list-group">
            @foreach ($kid->chores as $chore)
            @if ($chore->complete == 1)
            <a href="#" class="list-group-item list-group-item-success" data-id="{{ $chore->id }}">
            @else
            <a href="#" class="list-group-item" data-id="{{ $chore->id }}">
            @endif
              @if ($chore->points != 0)
              <span class="badge">{{ $chore->points }}</span>
              @endif
              <h4 class="list-group-item-heading">{{ $chore->name }}</h4>
              <p class="list-group-item-text">{{ $chore->description }}</p>
            </a>
            @endforeach
          </div>
        </div>
        @endforeach
    </div>
  </div>
@endsection

@section ('scripts')

  <script language="javascript" type="text/javascript">

    $('.list-group-item').not( ".list-group-item-success" ).click(function(e) {
        e.preventDefault();
        $.ajax({
          type: 'POST',
          context: this,
          data: {
           _token: "{{ csrf_token() }}",
          },
          datatype: 'json',
          url: '/complete/' + $(this).data('id'),
          success: function(data) {
            if (data == 1) {
              location.reload();
            } else {
              alert("Could not complete chore, try again!");
            }
          },
          error: function(data) {
              alert("Could not complete chore, try again!");
          }
        });
    });

  </script>
@endsection
