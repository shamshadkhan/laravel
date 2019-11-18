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
          <td>Slider Title</td>
          <td>Slider Sub title</td>
          <td>Slider Description</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($sliders as $slider)
        <tr>
            <td>{{$slider->id}}</td>
            <td>{{$slider->title}}</td>
            <td>{{$slider->sub_title}}</td>
            <td>{{$slider->description}}</td>
            <td><a href="{{ route('sliders.edit',$slider->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('sliders.destroy', $slider->id)}}" method="post">
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