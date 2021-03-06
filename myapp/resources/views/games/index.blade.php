@extends('layouts.app')

@section('title', 'ゲーム一覧')

@section('content')
  <div class="container">
    <h2>ゲーム一覧</h2>
      @if(Session::has('flash'))
        <div class="alert alert-success" role="alert">
          {{ session('flash') }}
        </div>
      @endif

    <form method="get">
      @csrf
      <div class="form-group">
        <input type="text" name="keyword" value="{{$keyword}}" placeholder="ゲーム検索">
        <input type="submit" value="検索" class="btn btn-dark btn-sm">
      </div>
    </form>

    <a href="/games/create">ゲームタイトルを追加する</a>
    <br><br>
      
    @foreach ($games as $game)
      <div class="media">
        <img src="{{ $game->image }}" width="80" height="80" class="rounded-circle">
        <div class="media-body">
          <h5 class="mt-4 ml-2"><a href="/game/{{$game->id}}">{{$game->name}}</a></h5>
        </div>
      </div>      
      <hr>
    @endforeach
  {!! $games->appends(['keyword'=>$keyword])->render() !!}

  </div>
@endsection