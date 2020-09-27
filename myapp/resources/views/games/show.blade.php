@extends('layouts.app')

@section('title', $game->name)

@section('content')

  <div class="container text-center">
    <h1>{{$game->name}}</h1>

    <div class="post-image">
      <img src="{{ $game->image }}" width="30%" class="rounded-circle">
    </div>

    <a href='/game/{{$game->id}}/recruitments/create'>募集を作成する</a>

    <div class="recruitment">
      <h5>
        <i class="fas fa-hands-helping text-danger"></i>
        <a href='/game/{{$game->id}}/recruitment/create'>募集を作成する</a>
      </h5>
      
      @foreach ($recruitments as $recruitment)
        <div class="card">
          <div class="card-body">
            <h5>
              <i class="fas fa-hands-helping text-danger"></i>
              <a href="/recruitment/{{$recruitment->id}}">{{$recruitment->title}}</a>
            </h5>
            <p>日時：{{$recruitment->start_time}}</p>
            <p>投稿者：{{ $recruitment->user->name}}</p>
          </div>
        </div>
        <br>
      @endforeach
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

    <a class="btn btn-outline-secondary btn-sm ml-2 mr-2" href="/games/{{$game->id}}/edit">ゲーム情報を編集する</a>
    
    <form action="/games/{{$game->id}}" method="post">
      {{ csrf_field() }}
      <input type="hidden" name="_method" value="delete">
      <button type="submit" class="btn btn-outline-danger btn-sm">このゲーム情報を削除する</button>
    </form>
  </div>
@endsection
