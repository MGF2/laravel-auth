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
  <form action="{{route('posts.update', $post->id )}}" method="post" enctype="multipart/form-data" class="card col-lg-6 mx-auto">
  @csrf
  @method('PATCH')
  <img src="{{ asset('storage/' . $post->img)}}" alt="{{ $post->slug}}" width="300px">
    <label for="img">Immagine:</label>
      <input type="file" name="img" accept="image/*">
    <label for="title">Titolo:</label>
      <input type="text" name="title" placeholder="Inserisci il titolo" value="{{$post->title}}">
    <label for="content">Post:</label>
      <textarea name="body" rows="8" cols="80" placeholder="Inserisci il testo">{{$post->body}}</textarea>
    <div>
      @foreach ($tags as $tag)
        <label for="tag">{{$tag->name}}</label>
        <input type="checkbox" name="tags[]" value="{{$tag->id}}" {{($post->tags->contains($tag->id) ? 'checked' : '')}}>
      @endforeach
    </div>
    <input type="submit"class="btn btn-primary" value="Invia">
  </form>
@endsection
