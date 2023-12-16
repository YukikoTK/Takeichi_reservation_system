@extends('layouts.common')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/review.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
@endsection

@include('layouts.header')

@section('content')
    <div class="form_inner">
        <form class="form_inner-review" action="{{ route('review.store') }}" method="POST" id="reviewForm">
            @csrf
            <div class="form_inner-items">
                @if (count($errors) > 0)
                    <p class="error_msg">入力内容を確認してください</p>
                @endif
                <div class="review">
                    <h3 class="ttl_review">スター</h3>
                </div>
                @error('rate')
                    <p class="error_msg">{{$errors->first('rate')}}</p>
                @enderror
                <div class="rate_form">
                    <input id="star5" type="radio" name="rate" value="5" {{ old('rate') == '5' ? 'checked' : '' }}>
                    <label for="star5">★</label>
                    <input id="star4" type="radio" name="rate" value="4" {{ old('rate') == '4' ? 'checked' : '' }}>
                    <label for="star4">★</label>
                    <input id="star3" type="radio" name="rate" value="3" {{ old('rate') == '3' ? 'checked' : '' }}>
                    <label for="star3">★</label>
                    <input id="star2" type="radio" name="rate" value="2" {{ old('rate') == '2' ? 'checked' : '' }}>
                    <label for="star2">★</label>
                    <input id="star1" type="radio" name="rate" value="1" {{ old('rate') == '1' ? 'checked' : '' }}>
                    <label for="star1">★</label>
                </div>
                <div class="edit">
                    <h3 class="ttl_review">コメント</h3>
                </div>
                @error('comment')
                    <p class="error_msg">{{$errors->first('comment')}}</p>
                @enderror
                <div class="rate_comment">
                    <textarea class="rate_comment-text" name="comment" id="comment" placeholder="コメントを入力してください">{{ old('comment') }}</textarea>
                </div>
            </div>
            <div class="form_btn">
                @foreach ($bookRecords as $bookRecord)
                    <input type="hidden" name="shop_id" value="{{ $bookRecord->shop->id }}">
                @endforeach
                <button class="form_button-submit" type="submit">登録</button>
            </div>
        </form>
    </div>
@endsection