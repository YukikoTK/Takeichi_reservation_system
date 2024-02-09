@extends('layouts.common')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/review.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
@endsection

@include('layouts.header')

@section('content')
<form class="form_inner-review" action="{{ route('review.store') }}" method="POST" id="reviewForm" enctype="multipart/form-data">
@csrf
    <div class="flex_item">
        <div class="shop_inner">
            <h1 class="shop_inner-ttl">今回のご利用はいかがでしたか？</h1>
            <div class="shop_card">
                <div class="card_img">
                    <img src="{{ asset('storage/image/' . basename($visitedShop->img)) }}" alt="店舗の画像">
                </div>
                <div class="card_content">
                    <h2 class="shop_name">{{$visitedShop->shop}}</h2>
                    <div class="tag">
                        <p class="tag_area">#{{$shopInfo->area->area}}</p>
                        <p class="tag_genre">#{{$shopInfo->genre->genre}}</p>
                    </div>
                    <div class="btn_flex">
                        <a href="{{ route('detail.show', ['shop_id' => $visitedShop->id]) }}" class="shop_btn">詳しくみる</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="form_inner">
            <div class="form_inner-items">
                @if (count($errors) > 0)
                    <p class="error_msg">入力内容を確認してください</p>
                @endif
                <div class="review">
                    <h2 class="ttl_review">体験を評価してください</h2>
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
                    <h2 class="ttl_review">口コミを投稿</h2>
                </div>
                @error('comment')
                    <p class="error_msg">{{$errors->first('comment')}}</p>
                @enderror
                <div class="rate_comment">
                    <textarea class="rate_comment-text" name="comment" id="comment" placeholder="カジュアルな夜のお出かけにおすすめのスポット" rows="10" onkeyup="ShowLength(value);">{{ old('comment') }}</textarea>
                    <p class="inputlength"><span id="inputlength">{{ mb_strlen(old('comment')) }}</span>/400(最高文字数)</p>
                </div>
                <div class="edit">
                    <h2 class="ttl_review">画像の追加</h2>
                </div>
                @error('img')
                    <p class="error_msg">{{$errors->first('img')}}</p>
                @enderror
                <div class="upload-box">
                    <input type="file" accept="image/jpeg, image/png" id="input" name="img" hidden/>
                    <span class="rate_img-link">クリックして写真を追加</span>
                    <span class="rate_img-link rate_img-drop">またはドラッグアンドドロップ</span>
                    <div class="preview-box">
                        <img class="previewImg" src="" alt="" hidden />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form_btn">
        <input type="hidden" name="shop_id" value="{{ $visitedShop->id }}">
        <button class="form_button-submit" type="submit">口コミを投稿</button>
    </div>
</form>
<!-- JavaScript読み込み -->
<script src="{{ asset('/js/str_count.js') }}"></script>
<script src="{{ asset('/js/upload.js') }}"></script>
@endsection