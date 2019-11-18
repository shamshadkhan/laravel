@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Slider
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
      <form method="post" action="{{ route('sliders.update', $slider->id) }}" enctype="multipart/form-data">
          <div class="form-group">
              @method('PATCH')
              @csrf
              <label for="name">Slider Name:</label>
              <input type="text" class="form-control" name="title" value="{{ $slider->title }}"/>
          </div>
          <div class="form-group">
              <label for="name">Slider Sub Title:</label>
              <input type="text" class="form-control" name="sub_title" value="{{ $slider->sub_title }}"/>
          </div>
          <div class="form-group">
              <label for="price">Slider Description :</label>
              <textarea class="form-control" name="description">{{ $slider->description }}</textarea>
          </div>
          <button type="submit" class="btn btn-primary">Edit</button>
      </form>
  </div>
</div>
@endsection