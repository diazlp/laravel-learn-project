@extends('layout.master')

@section('judul')
  View All Books
@endsection

@section('content')

@auth
  <a href="/book/create" class="btn btn-primary btn-sm">Add Book</a>
@endauth

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Book Title</th>
      <th scope="col">Summary</th>
      <th scope="col">Release Year</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @forelse ($books as $key => $value)
      <tr>
        <th scope="row">{{$key + 1}}</th>
        <td>{{$value->title}}</td>
        <td>{{$value->summary}}</td>
        <td>{{$value->release_year}}</td>
        <td>
          <form action="/book/{{$value->id}}" method="POST">
            @csrf
            @method('DELETE')
            <a href="/book/{{$value->id}}" class="btn btn-info btn-sm">View Detail</a>
            @auth
            <a href="/book/{{$value->id}}/edit" class="btn btn-warning btn-sm">Update</a>
            <input type="submit" value="Delete" class="btn btn-danger btn-sm" />
            @endauth
          </form>
        </td>
      </tr>
    @empty
      <tr>
        <td>No Books</td>
      </tr>
    @endforelse

  </tbody>
</table>
@endsection