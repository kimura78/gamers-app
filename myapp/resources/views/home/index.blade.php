@extends('layouts.app')

@section('content')
  <div class="top-page">
    <div class="col-12 d-none d-md-block mb-5">
      <img class="card-img" src="{{ secure_asset('images/top-1.jpg') }}">

      <div class="card-img-overlay text-white text-center mt-5">
        @if(Session::has('flash'))
          <div class="alert alert-success" role="alert">
            {{ session('flash') }}
          </div>
        @endif

        <h1 class="display-4 mt-5">GAMERS</h1>
        <p class="mt-3">ゲームをプレイする仲間を募集しましょう！</p>
        <a class="btn btn-success" href="/games">ゲームを検索</a>
      </div>
    </div>

    <div class="col-12 d-md-none">
      <img class="card-img" src="{{ secure_asset('images/top-2.png') }}">

      <div class="card-img-overlay text-white text-center mt-5">
        @if(Session::has('flash'))
          <div class="alert alert-success" role="alert">
            {{ session('flash') }}
          </div>
        @endif

        <h1 class="display-4 mt-5">GAMERS</h1>
        <p class="mt-3">ゲームをプレイする仲間を募集しましょう！</p>
        <a class="btn btn-success" href="/games">ゲームを検索</a>
      </div>

    </div>
  </div>

@endsection