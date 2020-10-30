@extends('layouts.app')
@section('content')
<div class="card-deck">
  <div class="row">
    @foreach ($posts as $post)
      <div class="col-sm-4 pt-3">
        <div class="card">
          {{-- prova nope
          <img src="{{(Storage::url($post->img) == '') ? 'https://picsum.photos/300/200' : Storage::url($post->img)}}" class="card-img-top" alt="{{$post->title}}"> --}}
          <img src="{{Storage::url($post->img)}}" class="card-img-top" alt="{{$post->title}}">
          <div class="card-body">
            <h5 class="card-title">{{$post->title}}</h5>
            <p class="card-text">{{Str::substr($post->body,0,200). '...'}}</p>
            <p class="card-text"><small class="text-muted">{{$post->user->name}}</small></p>
            <ul class="list-inline">
              @forelse ($post->tags as $tag)
                <li class="text-muted list-inline-item"><i class="fa fa-tag text-primary" aria-hidden="true"></i> {{ $tag->name }}</li>
              @empty
                <p>No Tags</p>
              @endforelse
            </ul>
            <a href="{{route('guest.posts.show',$post->slug)}}" class="btn btn-primary">Leggi</a>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection
