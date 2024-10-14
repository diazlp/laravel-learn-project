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

      @auth
        @if ($book->borrowers->isNotEmpty())
          <hr />
          <h5>List of {{ $book->name }} Borrowers</h5>
          <ul>
              @foreach ($book->borrowers as $borrower)
                  <li>{{ $borrower->user->name }}</li>
              @endforeach
          </ul>
        @endif
      @endauth

      <form action="/book/{{$book->id}}/borrow" method="POST">
        @csrf
        @method("POST")
        <a href="/book" class="btn btn-primary">Go back</a>

        @if ($book->stock > 0)
          @auth
            <input type="submit" value="Loan Book" class="btn btn-warning" />
          @endauth
        @endif
      </form>
@endsection