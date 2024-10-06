@extends('layout.master')

@section('judul')
  Update Category: {{$category->name}}
@endsection

@section('content')
  <form action="/category/{{$category->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="name">Category Name</label>
      <input type="text" class="form-control" id="name" name="name" value={{$category->name}}>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  @error('name')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror
@endsection