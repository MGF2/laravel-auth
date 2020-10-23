@extends('layouts.app')
@section('content')
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
   @endif
  <form action="{{route('posts.store')}}" method="post"  enctype="multipart/form-data" class="card col-5 mx-auto">
  @csrf
  @method('POST')
    <label for="title">Titolo:</label>
      <input type="text" name="title" placeholder="Inserisci il titolo">
    <label for="img">Immagine:</label>
      <input type="file" name="img" accept="image/*">
    <label for="content">Post:</label>
      <textarea name="body" rows="8" cols="80" placeholder="Inserisci il testo"></textarea>
    <input type="submit"class="btn btn-primary" value="Invia">
    <div>
      @foreach ($tags as $tag)
        <label for="tag">{{$tag->name}}</label>
        <input type="checkbox" name="tags[]" value="{{$tag->id}}">
      @endforeach
    </div>
  </form>
@endsection
