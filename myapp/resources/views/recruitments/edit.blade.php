@extends('layouts.app')

@section('title', '募集編集')

@section('content')
  <div class="container">
    <form method="POST" action="/recruitments/{{$recruitment->id}}">
      @csrf
      <div class="form-group">
        <input class="form-control" name="title" type="text" value="{{$recruitment->title}}" required>
      </div>
  
      <div class="form-group">
        <label>日時</label>
        <input class="form-control" name="start_time" type="text" value="{{$recruitment->start_time}}" required>
      </div>


      <input type="hidden" name="_method" value="patch">
      <button type="submit" class="btn btn-outline-primary btn-sm">更新</button>

    </form>

    <form action="/recruitments/{{$recruitment->id}}" method="post">
      @csrf
      <input type="hidden" name="_method" value="delete">
      <button type="submit" class="btn btn-outline-danger btn-sm mt-4">この募集を削除する</button>
    </form>
  </div>
@endsection