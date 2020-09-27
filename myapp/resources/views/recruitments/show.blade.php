@extends('layouts.app')

@section('title', $recruitment->name)

@section('content')
    <div class="container">
      @if(Session::has('flash'))
        <div class="alert alert-success" role="alert">
          {{ session('flash') }}
        </div>
      @endif

      <div class="card">
        <div class="card-body">
          <h4>{{$recruitment->title}}</a></h4>
          <p>ゲーム：{{ $recruitment->game->name}}</p>
          <p>日時：{{$recruitment->start_time}}</p>
          <p>投稿者：{{ $recruitment->user->name}}</p>
          <p>投稿日時：{{ $recruitment->created_at }}</p>
          <a href="/recruitment/{{$recruitment->id}}/edit">編集する</a>
          <a href="/game/{{ $recruitment->game->id }}">一覧に戻る</a>
        </div>
      </div>
    </div>
@endsection