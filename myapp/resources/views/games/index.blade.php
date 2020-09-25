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
      <h4><a href="/game/{{$game->id}}">{{$game->name}}</a></h4>
      <div class="post-image">
        <img src="{{ $game->image }}" width="30%"/>
      </div>
      {{-- <img src="{{ asset('storage/'.$game->image) }}"> --}}
      {{-- <a href="/game/{{$game->id}}/edit">編集する</a> --}}
        {{-- <a href="/games/{{$game->id}}">削除する</a> --}}
      <hr>
    @endforeach
  </div>
@endsection