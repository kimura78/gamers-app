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
        <h4><i class="fas fa-hands-helping text-danger"></i>{{$recruitment->title}}</h4>
        <p class="mt-4"><i class="fas fa-user mr-2 text-info ml-3"></i>{{ $recruitment->user->name}}</p>
        
        <p><i class="fas fa-gamepad mr-2 ml-3"></i>{{ $recruitment->game->name }}
          <i class="far fa-clock mr-2 ml-5"></i>{{$recruitment->start_time}}
        </p>
        <small>{{ $recruitment->created_at }}</small>

        @if ($recruitment->user->id == Auth::user()->id)
          <a class="btn btn-outline-secondary btn-sm text-center" href="/recruitment/{{$recruitment->id}}/edit">編集する</a>
        @endif

      </div>
    </div>

    <br>

    @foreach ($comments as $comment)
      <div class="card">
        <div class="card-body">
          <p><i class="fas fa-user mr-2 text-info"></i>{{$comment->user->name}}</p>
          <p class="ml-3"><i class="fas fa-pen mr-2 text-success"></i>{{$comment->content}}</p>
          <small>{{$comment->created_at}}</small>

          @if ($comment->user->id == Auth::user()->id)
            <form action="/comments/{{$comment->id}}" method="post">
              @csrf
              <input type="hidden" name="_method" value="delete">
              <button type="submit" class="btn btn-outline-danger btn-sm mt-4">コメントを削除</button>
            </form>
          @endif
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