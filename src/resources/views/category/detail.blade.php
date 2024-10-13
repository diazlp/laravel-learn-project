@extends('layout.master')

@section('judul')
  View Category {{$category->name}}
@endsection

@section('content')
      <h5 class="card-title">{{$category->name}}</h5>
      <p class="card-text"><b>Created at:</b> {{$category->created_at}}</p>

      @if ($category->books->isNotEmpty())
        <h5>List of {{ $category->name }} Books</h5>
        <ul>
            @foreach ($category->books as $book)
                <li>{{ $book->title }}</li>
            @endforeach
        </ul>
      @else
          <p>No books available in this category.</p>
      @endif

      <a href="/category" class="btn btn-primary">Go back</a>
@endsection