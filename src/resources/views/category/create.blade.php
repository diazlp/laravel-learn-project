@extends('layout.master')

@section('judul')
  Add Category
@endsection

@section('content')
  <form action="/category" method="POST">
    @csrf
    <div class="form-group">
      <label for="name">Category Name</label>
      <input type="text" class="form-control" id="name" name="name">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  @error('name')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror
@endsection