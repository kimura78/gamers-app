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

      <div class="pl-2">
        <input type="hidden" name="_method" value="patch">
        <button type="submit" class="btn btn-primary">更新</button>
      </div>
    </form>
  </div>
@endsection