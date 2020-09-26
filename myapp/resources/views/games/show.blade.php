@extends('layouts.app')

@section('title', $game->name)

@section('content')

  <div class="container text-center">
    <h1>{{$game->name}}</h1>

    <div class="post-image">
      <img src="{{ $game->image }}" width="30%" class="rounded-circle">
    </div>

    <div class="tweets text-center">
      <h5><i class="fab fa-twitter mr-2 text-primary"></i>このゲームに関するツイート</h5>

        @foreach ($tweets as $tweet)
          <div class="card text-center">
            <div class="card-body">
              <i class="fab fa-twitter mr-2 text-primary"></i>
              {{$tweet->text}}
            </div>
          </div>
        @endforeach

    </div>
  </div>


  <a class="btn btn-outline-secondary btn-sm ml-2 mr-2" href="/games/{{$game->id}}/edit">ゲーム情報を編集する</a>
  <form action="/game/{{$game->id}}" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="delete">
    <button type="submit" class="btn btn-outline-danger btn-sm">このゲーム情報を削除する</button>
  </form>

@endsection
