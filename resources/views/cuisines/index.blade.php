@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Cuisine Title</td>
          <td>Cuisine Price</td>
          <td>Cuisine Discount</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($cuisines as $cuisine)
        <tr>
            <td>{{$cuisine->id}}</td>
            <td>{{$cuisine->title}}</td>
            <td>{{$cuisine->price}}</td>
            <td>{{$cuisine->discount_amount}}</td>
            <td><a href="{{ route('cuisines.edit',$cuisine->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('cuisines.destroy', $cuisine->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        {!! $cuisines->render() !!}
    </tbody>
  </table>
<div>
@endsection