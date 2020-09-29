@extends('layouts.app')

@section('title', 'ゲーム作成')

@section('content')

  <div class="container">
    <form method="POST" action="/games" enctype="multipart/form-data">
      @csrf
  
      <div class="form-group">
        <input class="form-control" name="name" type="text" placeholder="ゲーム名を入力してください" required>
      </div>
  
      <div class="form-group row">
        <div class="col-md-12">
          <input type="file" name="image" accept="image/jpeg,image/gif,image/png" required>
        </div>
      </div>  
  
      <button type="submit" class="btn btn-primary">作成する</button>
    </form>
  </div>
@endsection