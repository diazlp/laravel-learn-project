@extends('layout.master')

@section('judul')
  Update Book: {{$book->title}}
@endsection

@section('content')
  <form action="/book/{{$book->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for=<label for="title">Book Title</label>
      <input type="text" class="form-control" id="title" name="title" value="{{$book->title}}">
    </div>
    @error('title')
     <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
      <label for="summary">Summary</label>
      <textarea type="text" class="form-control" id="summary" name="summary">{{$book->summary}}</textarea>
    </div>
    @error('summary')
      <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
      <label for="release_year">Release Year</label>
      <input type="number" class="form-control" id="release_year" name="release_year" value="{{$book->release_year}}">
    </div>
    @error('release_year')
      <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
      <label for="stock">Stock</label>
      <input type="number" class="form-control" id="stock" name="stock" value="{{$book->stock}}">
    </div>
    @error('stock')
     <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
      <label for="category">Category</label>
      <select class="custom-select" id="category" name="category_id">
        @forelse ($categories as $key => $value)
          @if ($book->category_id === $value->id)
           <option value="{{$value->id}}" key="{{$key}}" selected>{{$value->name}}</option>
          @else
            <option value="{{$value->id}}" key="{{$key}}">{{$value->name}}</option>
          @endif
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