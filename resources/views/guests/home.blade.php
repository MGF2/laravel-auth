@extends('layouts.app')
@section('content')
  <div class="display-4 p-5 text-center">
    This is my awsome blog
  </div>
  @guest
    <p class="lead text-center" >Guest</p>
  @else
    <p class="lead text-center">Il tuo nome è: {{ Auth::user()->name }}</p>
  @endguest
@endsection