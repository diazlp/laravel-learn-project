@extends('layout.master')

@section('judul')
 Add Book
@endsection

@section('content')
  <form action="/book" method="POST">
    @csrf
    <div class="form-group">
      <label for="title">Book Title</label>
      <input type="text" class="form-control" id="title" name="title">
    </div>
    @error('title')
     <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
      <label for="summary">Summary</label>
      <textarea type="text" class="form-control" id="summary" name="summary"></textarea>
    </div>
    @error('summary')
      <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
      <label for="release_year">Release Year</label>
      <input type="number" class="form-control" id="release_year" name="release_year">
    </div>
    @error('release_year')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    
    <div class="form-group">
      <label for="stock">Stock</label>
      <input type="number" class="form-control" id="stock" name="stock">
    </div>
    @error('stock')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
      <label for="category">Category</label>
      <select class="custom-select" id="category" name="category_id">
        <option selected>Please select category</option>
        @forelse ($categories as $key => $value)
         <option value="{{$value->id}}" key="{{$key}}">{{$value->name}}</option>
        @empty
          <option value="">No Category Data</option>
        @endforelse
      </select>
    </div>
    @error('category_id')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection