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
          <td>Service Title</td>
          <td>Service Description</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($services as $service)
        <tr>
            <td>{{$service->id}}</td>
            <td>{{$service->title}}</td>
            <td>{{$service->description}}</td>
            <td><a href="{{ route('services.edit',$service->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('services.destroy', $service->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection
