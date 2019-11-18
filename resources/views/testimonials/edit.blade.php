@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Testimonial
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
      <form method="post" action="{{ route('testimonials.update', $testimonial->id) }}" enctype="multipart/form-data">
          <div class="form-group">
              @method('PATCH')
              @csrf
              <label for="price">Testimonial Description :</label>
              <textarea class="form-control" name="description">{{ $testimonial->description }}</textarea>
          </div>
          <button type="submit" class="btn btn-primary">Edit</button>
      </form>
  </div>
</div>
@endsection