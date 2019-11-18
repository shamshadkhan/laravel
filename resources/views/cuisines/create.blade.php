@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add Cuisine
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
      <form method="post" action="{{ route('cuisines.store') }}" enctype="multipart/form-data">
          <div class="form-group">
              @csrf
              <label for="name">Cuisine Name:</label>
              <input type="text" class="form-control" name="title"/>
          </div>
          <div class="form-group">
              <label for="name">Cuisine Price:</label>
              <input type="number" class="form-control" name="price"/>
          </div>
          <div class="form-group">
              <label for="price">Cuisine Discount :</label>
              <input type="number" value= "0" class="form-control" name="discount_amount"/>
          </div>
          <div class="form-group">
              <label for="quantity">Cuisine Image:</label>
              <input type="file" class="form-control" name="image"/>
          </div>
          <button type="submit" class="btn btn-primary">Add</button>
      </form>
  </div>
</div>
@endsection