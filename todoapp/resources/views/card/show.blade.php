@extends('layouts.app')
@section('content')
<div class="panel-body">
  <!-- バリデーションエラーの場合に表示 --> 
  @include('common.errors')
  <div class='container'>
    <div class='detail'>
      <h2>タイトル</h2>
      <div class="title">{{ $card->title }}</div>
      <h2>メモ</h2>
      <div class="memo new-line">{{ $card->memo }}</div>
      <h2>リスト名</h2>
      <div class="list">{{ $card->listing->title }}</div>
    </div>
    <div class="btnWrapper">
      <a class="editBtn" href="{{ url('/cardsedit', $card->id) }}">編集する</a>
      <a class="deleteBtn" onclick="return confirm('{{ $card->title }}を削除して大丈夫ですか？')" href="{{ url('/cardsdelete', $card->id) }}">削除する</a>
    </div>
  </div>
</div>
@endsection
