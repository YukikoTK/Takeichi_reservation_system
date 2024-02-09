@extends('layouts.common')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/reviewAll.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
@endsection

@include('layouts.header')

@section('content')
<div class="main_content">
    <h1 class="title">
        {{ $shopName }}<br>口コミ投稿一覧
    </h1>
    <table class="table_inner">
        <tr class="table_inner-row">
            <th class="table_inner-head star">評価</th>
            <th class="table_inner-head comment">コメント</th>
            <th class="table_inner-head review_img">画像</th>
        </tr>
        @foreach($allReviews as $allReview)
            <tr class="table_inner-row">
                <td class="table_inner-data">
                    <div class="star_rating">
                        <div class="star_rating-front">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $allReview->star)
                                    <span class="star">★</span>
                                @else
                                    <span class="star">☆</span>
                                @endif
                            @endfor
                        </div>
                        <div class="star_rating-back">
                            @for ($i = $allReview->star + 1; $i <= 5; $i++)
                                <span class="star">☆</span>
                            @endfor
                        </div>
                    </div>
                </td>
                <td class="table_inner-data comment_left">{{ $allReview->comment }}</td>
                <td class="table_inner-data">
                    @if ($allReview->img_review)
                        <img class="review_img-img" src="{{ asset('storage/review_image/' . basename($allReview->img_review)) }}" alt="投稿画像">
                    @else
                        <p>No image</P>
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
    {{ $allReviews->links() }}
    <div class="button">
        <button class="return_button" onclick="location.href='{{ route('detail.show', ['shop_id' => $shopId])  }}'">戻る</button>
    </div>
</div>
@endsection