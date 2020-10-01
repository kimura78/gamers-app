@extends('layouts.app')

@section('title', $game->name)

@section('content')

  <div class="container text-center">
    @if(Session::has('flash'))
      <div class="alert alert-success" role="alert">
        {{ session('flash') }}
      </div>
    @endif
      
    <h1>{{$game->name}}</h1>

    <div class="post-image">
      <img src="{{ $game->image }}" width="30%">
    </div>

    @if (Auth::check())
      @if (!$bookmark)
        <form method="POST" action="/bookmarks" class="mt-3 mb-3">
          @csrf
          <input type="hidden" name="game_id" value={{ $game->id }}>
          <button class="btn btn-outline-success btn-sm"　type="submit">
            <i class="fas fa-bookmark mr-1"></i>ブックマークに追加
          </button>
          <p>{{$bookmark}}</p>
        </form>
      @else
        <form action="/bookmarks/{{$bookmark[0]->id}}" method="post">
          @csrf
          <input type="hidden" name="_method" value="delete">
          <button type="submit" class="btn btn-outline-danger btn-sm mt-4">ブックマークを解除</button>
        </form>
      @endif 
    @endif

    <br><br>

    <div class="row">
      <div class="col-sm">
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
                <p><i class="far fa-clock mr-2"></i>{{$recruitment->start_time}}</p>
                <p><i class="fas fa-user mr-2 text-info"></i>{{ $recruitment->user->name}}</p>
              </div>
            </div>

          @endforeach
        </div>
      </div>

      <div class="col-sm">
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
    </div>

    <br><br>

    {!! $recruitments->render() !!}


    @if (Auth::check())
      @if ($game->user->id == Auth::user()->id)
        <a class="btn btn-outline-secondary btn-sm text-center" href="/game/{{$game->id}}/edit">ゲーム情報を編集する</a>
      @endif 
    @endif
  </div>
@endsection