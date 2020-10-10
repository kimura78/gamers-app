@extends('layouts.app')

@section('title', '募集一覧')

@section('content')
  <div class="container">
    <h2>募集一覧</h2>
    @if(Session::has('flash'))
      <div class="alert alert-success" role="alert">
        {{ session('flash') }}
      </div>
    @endif

    @foreach ($recruitments as $recruitment)
      <div class="card">
        <div class="card-body">
          <h5>
            <i class="fas fa-hands-helping text-danger"></i>
            <a href="/recruitment/{{$recruitment->id}}">{{$recruitment->title}}</a>
          </h5>

          <p><i class="fas fa-user mr-2 text-info ml-3"></i>{{ $recruitment->user->name}}</p>

          <p><i class="fas fa-gamepad mr-2 ml-3"></i>{{ $recruitment->game->name }}</p>
          <p><i class="far fa-clock mr-2 ml-5"></i>{{$recruitment->start_time}}</p>
        </div>
      </div>
      <br>
    @endforeach
  </div>
@endsection