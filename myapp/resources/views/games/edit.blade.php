@extends('layouts.app')

@section('title', $game->name)

@section('content')
  <div class="container">
    <form method="POST" action="/games/{{$game->id}}">
      @csrf

      <div class="form-group">
        <label id="title">名前：</label><br />
        <input class="form-control" name="name" type="text" value="{{$game->name}}" required>
      </div>

      <div class="form-group">
        <input type="file" name="image" accept="image/jpeg,image/gif,image/png" required>
      </div>

      <input type="hidden" name="_method" value="patch">
      <button type="submit" class="btn btn-outline-primary btn-sm">編集する</button>
    </form>

    <form action="/games/{{$game->id}}" method="post">
      @csrf
      <input type="hidden" name="_method" value="delete">
      <button type="submit" class="btn btn-outline-danger btn-sm mt-4">このゲーム情報を削除する</button>
    </form>
  </div>
  
@endsection