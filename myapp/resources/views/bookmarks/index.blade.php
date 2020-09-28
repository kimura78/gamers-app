@extends('layouts.app')

@section('content')
  <div class="container">
    @foreach ($bookmarks as $bookmark)

      <h4><a href="/game/{{$bookmark->id}}">{{$bookmark->game->name}}</a></h4>
      <form action="/bookmark/{{$bookmark->id}}" method="post">
        @csrf
        <input type="hidden" name="_method" value="delete">
        <input type="submit" value="ブックマークを削除">
      </form>

      <hr>
    @endforeach
  </div>
@endsection