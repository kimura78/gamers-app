@extends('layouts.app')

@section('title', '募集を作成')

@section('content')
  <div class="container">
    <form method="POST" action="/recruitments">
      @csrf
      <div class="form-group">
        <label>募集文</label>
        <input class="form-control" name="title" type="text" placeholder="募集文を入力してください" required>
      </div>
  
      <div class="form-group">
        <label>日時</label>
        <input class="form-control" name="start_time" type="text" placeholder="遊ぶ日時を書いてください" required>
      </div>
  
      <input type="hidden" name="game_id" value={{ $game_id }}>
  
      <button type="submit" class="btn btn-primary">作成する</button>
    </form>
  </div>
@endsection