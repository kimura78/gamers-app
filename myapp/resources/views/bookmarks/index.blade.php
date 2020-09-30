@extends('layouts.app')

@section('title', 'ブックマーク一覧')

@section('content')
  <div class="container">
    <h2>ブックマーク一覧</h2>
    <br>

    @foreach ($bookmarks as $bookmark)
      <div class="media">
        <img src="{{ $bookmark->game->image }}" width="80" height="80" class="rounded-circle">
        <div class="media-body">
          <h5 class="mt-4 ml-2"><a href="/game/{{$bookmark->game->id}}">{{$bookmark->game->name}}</a></h5>
        </div>
      </div>      
      <hr>
    @endforeach
  </div>
@endsection

