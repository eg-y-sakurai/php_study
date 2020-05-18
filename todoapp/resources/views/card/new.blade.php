@extends('layouts.app')
@section('content')
<div class="panel-body">
<!-- バリデーションエラーの場合に表示 --> 
@include('common.errors')

  <!-- カード作成フォーム -->
  <form action="{{ url('cards')}}" method="POST" class="form-div">
  {{csrf_field()}} 
    <div class="form-group"> 
      <label for="card" class="control-label">タイトル</label> 
      <input type="text" placeholder="カード名" name="card_title" class="form-control" value="{{ old('card_title') }}">
      <input type="hidden" name="id" value="{{ old('id', $listing_id) }}"> <!-- 配置場所がわからぬ！！ oldには引数を埋め込んだけどあってる？-->
    </div>
    <div class="form-group"> 
      <label for="card" class="control-label">メモ</label> 
      <textarea placeholder="詳細" name="card_memo" class="form-control" value="{{ old('card_memo') }}"></textarea>
    </div>
    <div class="form-group"> 
      <button type="submit" class="newBtn">作成する</button> 
    </div>
  </form>
</div> 
@endsection