@extends('layout.master')

@section('judul')
  View Category {{$category->name}}
@endsection

@section('content')
      <h5 class="card-title">{{$category->name}}</h5>
      <p class="card-text"><b>Created at:</b> {{$category->created_at}}</p>
      <a href="/category" class="btn btn-primary">Go back</a>
@endsection