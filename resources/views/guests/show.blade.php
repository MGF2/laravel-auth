@extends('layouts.app')
@section('content')
<div class="col-sm-8 pt-3 mx-auto">
  <div class="card">
    <img src="{{Storage::url($post->img)}}" class="card-img-top" alt="{{$post->title}}">
    <div class="card-body">
      <h5 class="card-title">{{$post->title}}</h5>
      <p class="card-text">{{$post->body}}</p>
      <p class="card-text"><small class="text-muted">{{$post->user->name}}</small></p>
      <p class="card-text"><small class="text-muted">{{$post->updated_at}}</small></p>
    </div>
  </div>
</div>
@endsection
