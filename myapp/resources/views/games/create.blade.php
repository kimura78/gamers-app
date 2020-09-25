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
            <input type="file" name="image" accept="image/jpeg,image/gif,image/png">
        </div>
      </div>
  
      
      {{-- <div class="col-md-4 mb-3">
        <label for="validationServer01">名前</label>
        <input type="text" class="form-control is-valid" id="validationServer01" placeholder="ゲーム名を入力してください" required>
        <div class="valid-feedback">
          Looks good!
        </div>
      </div> --}}
  
  
      <div class="pl-2">
          <input type="submit" value="送信" />
      </div>
    </form>
  </div>
@endsection