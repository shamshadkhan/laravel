@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add Testimonial
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
      <form method="post" action="{{ route('testimonials.store') }}" enctype="multipart/form-data">
          <div class="form-group">
              @csrf              
              <label for="price">Testimonial Description :</label>
              <textarea class="form-control" name="description"></textarea>
          </div>
          <div class="form-group">
              <label for="quantity">Testimonial Image:</label>
              <input type="file" class="form-control" name="image"/>
          </div>
          <button type="submit" class="btn btn-primary">Add</button>
      </form>
  </div>
</div>
@endsection