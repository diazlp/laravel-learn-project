@extends('layout.master')

@section('judul')
  View All Categories
@endsection

@section('content')
<a href="/category/create" class="btn btn-primary btn-sm">Add Category</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Category Name</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @forelse ($categories as $key => $value)
      <tr>
        <th scope="row">{{$key + 1}}</th>
        <td>{{$value->name}}</td>
        <td>
          <form action="/category/{{$value->id}}" method="POST">
            @csrf
            @method('DELETE')
            <a href="/category/{{$value->id}}" class="btn btn-info btn-sm">View Detail</a>
            <a href="/category/{{$value->id}}/edit" class="btn btn-warning btn-sm">Update</a>
            <input type="submit" value="Delete" class="btn btn-danger btn-sm" />
          </form>
        </td>
      </tr>
    @empty
      <tr>
        <td>No Categories</td>
      </tr>
    @endforelse

  </tbody>
</table>
@endsection