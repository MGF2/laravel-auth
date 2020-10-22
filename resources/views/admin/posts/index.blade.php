@extends('layouts.app')
@section('content')
  @if (session('status'))
    <div class="alert alert-success">
      {{ session('status')}}
    </div>
  @endif
<table class="table mx-auto col-5">
  <thead class="thead-light">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Title</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($posts as $post)
    <tr>
      <th scope="row">{{ $post->id }}</th>
      <td>{{ $post->title }}</td>
      <td><a href="{{ route('posts.edit', $post->id )}}">Edit</a></td>
      <td>
        <form action="{{ route('posts.destroy', $post->id )}}" method="post">
          @csrf
          @method('DELETE')
          <button type="submit" name="button" class="btn btn-primary">Delete</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
