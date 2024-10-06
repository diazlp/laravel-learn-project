@extends('layout.master')

@section('judul')
  View Book {{$book->title}}
@endsection

@section('content')
      <h2 class="card-title">{{$book->title}}</h2>
      <p class="card-text">{{$book->summary}}</p>
      <p class="card-text"><b>Release Year:</b> {{$book->release_year}}</p>
      <p class="card-text"><b>Stock:</b> {{$book->stock}}</p>
      <p class="card-text"><b>Category:</b> {{$book->category->name}}</p>
      <a href="/book" class="btn btn-primary">Go back</a>
@endsection