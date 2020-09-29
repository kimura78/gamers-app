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
        <p class="mt-4"><i class="fas fa-user mr-2"></i>{{ $recruitment->user->name}}</p>
        <p>{{$recruitment->start_time}}</p>
        <small><i class="fas fa-pen mr-2"></i>{{ $recruitment->created_at }}</small>

        <div>
          <a href="/recruitment/{{$recruitment->id}}/edit">編集する</a>
          <a href="/game/{{ $recruitment->game->id }}">一覧に戻る</a>
        </div>

      </div>
    </div>

    <br>

    @foreach ($comments as $comment)
      <div class="card">
        <div class="card-body">
          <p><i class="fas fa-user mr-2"></i>{{$comment->user->name}}</p>
          <p>{{$comment->content}}</p>
          <small><i class="fas fa-pen mr-2"></i>{{$comment->created_at}}</small>
        </div>
      </div>      
      <hr>
    @endforeach

    <div>
      <form method="POST" action="/comments" class="mt-3 mb-3">
        @csrf
        <input type="hidden" name="recruitment_id" value={{ $recruitment->id }}>
  
        <div class="form-group">
          <input class="form-control" name="content" type="text" placeholder="コメントを入力してください" required>
        </div>

        <button type="submit" class="btn btn-primary">コメントを送信</button>
  
      </form>
    </div>
  </div>
@endsection