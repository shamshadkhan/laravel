@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Cuisine
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
      <form method="post" action="{{ route('cuisines.update', $cuisine->id) }}" enctype="multipart/form-data">
          <div class="form-group">
              @method('PATCH')
              @csrf
              <label for="name">Cuisine Name:</label>
              <input type="text" class="form-control" name="title" value="{{ $cuisine->title }}"/>
          </div>
          <div class="form-group">
              <label for="name">Cuisine Price:</label>
              <input type="number" class="form-control" name="price" value="{{ $cuisine->price }}"/>
          </div>
          <div class="form-group">
              <label for="price">Cuisine Discount :</label>
              <input type="number" class="form-control" name="discount_amount" value="{{ $cuisine->discount_amount }}"/>
          </div>
          <button type="submit" class="btn btn-primary">Edit</button>
      </form>
  </div>
</div>
@endsection