@extends('layouts.app')
@section('content')
  <form action="{{route('posts.store')}}" method="post" class="card col-5 mx-auto">
  @csrf
  @method('POST')
    <label for="title">Titolo:</label>
      <input type="text" name="title" placeholder="Inserisci il titolo">
    <label for="content">Post:</label>
      <textarea name="body" rows="8" cols="80" placeholder="Inserisci il testo"></textarea>
    <input type="submit"class="btn btn-primary" value="Invia">
  </form>
@endsection
