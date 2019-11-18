@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Event
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('events.update', $event->id) }}" enctype="multipart/form-data">
          <div class="form-group">
              @method('PATCH')
              @csrf
              <label for="name">Event Venue:</label>
              <input type="text" class="form-control" name="venue" value="{{ $event->venue }}"/>
          </div>
          <div class="form-group">
              <label for="price">Event Description :</label>
              <textarea class="form-control" name="description">{{ $event->description }}</textarea>
          </div>
          <button type="submit" class="btn btn-primary">Edit</button>
      </form>
  </div>
</div>
@endsection