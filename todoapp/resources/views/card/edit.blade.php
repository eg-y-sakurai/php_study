@extends('layouts.app')
@section('content')
<div class="panel-body">
  <!-- バリデーションエラーの場合に表示 --> 
  @include('common.errors')
  
  <form action="{{ url('/card/edit')}}" method="POST" class="form-div">
    {{csrf_field()}} 
      <div class="form-group"> 
        <label for="card" class="control-label">タイトル</label>
        <input type="text" name="card_title" value="{{ old('card_title', $card->title) }}" class="form-control"> 
        <input type="hidden" name="card_id" value="{{ old('card_id', $card->id) }}"> 
      </div>
      <div class="form-group"> 
        <label for="card" class="control-label">メモ</label> 
        <textarea name="card_memo" class="form-control new-line">{{ old('card_memo', $card->memo) }}</textarea>
      </div>
      <div class="form-group"> 
        <label for="card" class="control-label">リスト名</label>
        <select name="list_select" class="form-control">
          @foreach ($listings as $listing)
            <option value="{{ $listing->id }}" @if(old('listing_id', $card->listing_id) == $listing->id)selected @endif>
              {{ $listing->title }}
            </option>
          @endforeach
        </select>
      </div>
      <div class="form-group"> 
        <button type="submit" class="newBtn">更新する</button>
      </div>
    </form>
</div>
@endsection
