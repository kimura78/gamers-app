@extends('layouts.app')

@section('content')
  <div class="container">
    @if(Session::has('flash'))
      <div class="alert alert-success" role="alert">
        {{ session('flash') }}
      </div>
    @endif

    <div class="text-center mt-5">
			<h1 class="display-4">GAMERS</h1>
			
			<i class="fas fa-gamepad fa-5x"></i>

			<p class="mt-3">ゲームをプレイする仲間を募集しましょう！</p>
			
      <a class="btn btn-outline-secondary" href="/game">ゲームを検索</a>
    </div>
	</div>
@endsection