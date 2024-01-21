@extends('layouts.common')

@section('css')
<link rel="stylesheet" href="{{ asset('css/common.css') }}">
<link rel="stylesheet" href="{{ asset('css/header.css') }}">
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@include('layouts.header')

@section('content')
    <div class="mypage_content">
        <h2 class="user_name">{{ $userRecord->name }}さん</h2>
        <div class="card_flex">
            <div class="book_form">
                @php
                    $sortedBookRecords = $bookRecords->sortBy('date');
                    $reservationNumber = 1;
                @endphp
                <h3 class="book_card-ttl">予約状況</h3>
                @foreach($sortedBookRecords as $sortedBookRecord)
                    <div class="book_card">
                        <div class="book_card-inner">
                            <p class="book_number">予約{{ $reservationNumber }}</p>
                            <form action="{{ route('mypage.destroy') }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <div class="btn">
                                    <input type="hidden" name="id" value="{{ $sortedBookRecord->id }}">
                                    <button class="delete_btn" type="submit">
                                        <img class="delete_icon" src="{{asset('img/x-icon.svg')}}" alt="取消ボタン">
                                    </button>
                                </div>
                            </form>
                        </div>
                        <form action="{{ route('book.edit') }}" method="GET" class="edit_form">
                            @csrf
                            <div class="confirm_table">
                                <table class="confirm_table-inner">
                                    <tr class="confirm_table-row">
                                        <th class="confirm_table-header">Shop</th>
                                        <td class="confirm_table-text">{{ $sortedBookRecord->shop->shop }}</td>
                                    </tr>
                                    <tr class="confirm_table-row">
                                        <th class="confirm_table-header">Date</th>
                                        <td class="confirm_table-text">{{ $sortedBookRecord->date }}</td>
                                    </tr>
                                    <tr class="confirm_table-row">
                                        <th class="confirm_table-header">Time</th>
                                        <td class="confirm_table-text">{{ substr($sortedBookRecord->time, 0, 5) }}</td>
                                    </tr>
                                    <tr class="confirm_table-row">
                                        <th class="confirm_table-header">Number</th>
                                        <td class="confirm_table-text">{{ $sortedBookRecord->number }}人</td>
                                    </tr>
                                </table>
                                @if(strtotime($sortedBookRecord->date) > strtotime(now()))
                                    <div class="btn edit_btn">
                                        <input type="hidden" name="id" value="{{ $sortedBookRecord->id }}">
                                        <button class="btn-decoration" type="submit">
                                            予約変更
                                        </button>
                                    </div>
                                @endif
                            </div>
                        </form>
                        @if(strtotime($sortedBookRecord->date) > strtotime(now()))
                            <form action="{{ route('qrcode.index') }}" method="GET" class="qr_form">
                                @csrf
                                <div class="btn qr_btn">
                                    <input type="hidden" name="id" value="{{ $sortedBookRecord->id }}">
                                    <button class="btn-decoration" type="submit">
                                        QRコード表示
                                    </button>
                                </div>
                            </form>
                        @endif
                        @if(strtotime($sortedBookRecord->date) < strtotime(now()))
                            <form action="{{ route('review.show') }}" method="get" class="review_form">
                                <div class="btn review_btn">
                                    <input type="hidden" name="id" value="{{ $sortedBookRecord->id }}">
                                    <button class="btn-decoration" type="submit">
                                        レビュー投稿
                                    </button>
                                </div>
                            </form>
                        @endif
                        <form action="{{ asset('pay') }}" method="POST">
                            @csrf
                        <script
                            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                            data-key="{{ env('STRIPE_KEY') }}"
                            data-amount="100"
                            data-name="Stripe決済デモ"
                            data-label="決済をする"
                            data-description="これはデモ決済です"
                            data-locale="auto"
                            data-currency="JPY">
                        </script>
                        </form>
                    </div>
                    @php
                        $reservationNumber++;
                    @endphp
                @endforeach
            </div>
            <div class="like_inner">
                <h3 class="like_card-ttl">お気に入り店舗</h3>
                <div class="flex_item">
                    @foreach($likedRecords as $likedRecord)
                        <div class="shop_card">
                            <div class="card_img">
                                <img src="{{ asset('storage/image/' . basename($likedRecord->shop->img)) }}" alt="店舗の画像">
                            </div>
                            <div class="card_content">
                                <h2 class="shop_name">{{ $likedRecord->shop->shop}}</h2>
                                <div class="tag">
                                    <p class="tag_area">#{{ $likedRecord->shop->area->area }}</p>
                                    <p class="tag_genre">#{{ $likedRecord->shop->genre->genre }}</p>
                                </div>
                                <div class="btn_flex">
                                    <a href="{{ route('detail.show', ['shop_id' => $likedRecord->shop->id]) }}" class="shop_btn">詳しくみる</a>
                                    <form action="{{ route('like.destroy') }}" method="post" class="like_form">
                                        @method('DELETE')
                                        @csrf
                                        <input type="hidden" name="shop_id" value="{{ $likedRecord->shop->id }}">
                                        <button type="submit" class="heart_btn">
                                            <img src="{{ asset('img/heart-red.svg') }}" alt="いいねボタン">
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection