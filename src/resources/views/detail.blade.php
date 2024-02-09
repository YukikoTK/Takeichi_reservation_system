@extends('layouts.common')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
@endsection

@section('content')
    <div class="flex">
        <div class="shop_inner">
            <div class="header_items">
                <!-- ハンバーガーメニュー -->
                <div id="btn" class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <nav id="menu">
                    <ul>
                        <li class="hamburger_list">
                            <button onclick="location.href='/'" class="menu_btn-items">Home</button>
                        </li>

                        <!-- ゲスト（未ログインユーザー）の場合のメニュー項目 -->
                        @guest
                            <li class="hamburger_list">
                                <button onclick="location.href='/register'" class="menu_btn-items">Registration</button>
                            </li>
                            <li class="hamburger_list">
                                <button onclick="location.href='/login'" class="menu_btn-items">Login</button>
                            </li>

                        <!-- ログインユーザーの場合のメニュー項目 -->
                        @else
                            <li class="hamburger_list">
                                <form action="{{ route('logout')}}"  method="POST">
                                @csrf
                                    <button class="menu_btn-items" type="submit">Logout</button>
                                </form>
                            </li>
                            <li class="hamburger_list">
                                <form action="{{ route('mypage.show') }}"  method="GET">
                                @csrf
                                    <button class="menu_btn-items" type="submit">Mypage</button>
                                </form>
                            </li>
                            <li>
                                <a href="/owner">管理者はこちら</a>
                            </li>
                            <li>
                                <a href="/manager">店舗代表者はこちら</a>
                            </li>
                        @endguest
                    </ul>
                </nav>

                <!-- タイトル -->
                <div class="header_items-ttl">
                    <h1>Rese</h1>
                </div>
            </div>
            <div class="flex_name">
                <p class="return_btn">
                    <a href="{{ route('shop.index') }}" class="arrow"><</a>
                </p>
                <h2 class="shop_name">{{$shop->shop}}</h2>
            </div>
            <div class="card_img">
                <img src="{{ asset('storage/image/' . basename($shop->img)) }}" alt="店舗の画像">
            </div>
            <div class="flex_tag">
                <p class="tag_area">#{{$shop->area->area}}</p>
                <p class="tag_genre">#{{$shop->genre->genre}}</p>
            </div>
            <p class="detail_shop">{{$shop->detail}}</p>
            <form action="{{ route('review.index') }}" class="review_all-form" method="GET">
            @csrf
                <div class="review_btn-all">
                    <input type="hidden" name="id" value="{{ $shop->id }}">
                    <button class="btn_all" type="submit">全ての口コミ情報</button>
                </div>
            </form>
            @if($myReview)
                <div class="review_items">
                    <div class="review_flex">
                        <ul class="review_list">
                            <li class="item">
                                <form action="{{ route('review.edit') }}" class="review_edit-form" method="GET">
                                @csrf
                                    <input type="hidden" name="id" value="{{ $myReview->id }}">
                                    <button class="review_edit" type="submit">口コミを編集</button>
                                </form>
                            </li>
                            <li class="item">
                                <form action="{{ route('review.destroy') }}"
                                class="review_delete-form" method="POST">
                                @method('DELETE')
                                @csrf
                                    <input type="hidden" name="id" value="{{ $myReview->id }}">
                                    <button class="review_delete" type="submit">口コミを削除</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                    <div class="review_contents">
                        <div class="star_rating">
                            <div class="star_rating-front">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $myReview->star)
                                        <span class="star">★</span>
                                    @else
                                        <span class="star">☆</span>
                                    @endif
                                @endfor
                            </div>
                            <div class="star_rating_back">
                                @for ($i = 1; $i <= 5; $i++)
                                    <span class="star">☆</span>
                                @endfor
                            </div>
                        </div>
                        <p class="review_comment">{{ $myReview->comment }}</p>
                        <div class="review_img">
                            @if ($myReview && $myReview->img_review)
                                <img class="review_img-img" src="{{ asset('storage/review_image/' . basename($myReview->img_review)) }}" alt="投稿画像">
                            @endif
                        </div>
                    </div>
                </div>
            @else
                <form action="{{ route('review.show') }}" method="get" class="review_form">
                    @csrf
                        <div class="btn review_btn">
                            <input type="hidden" name="id" value="{{ $shop->id }}">
                            <button class="btn-decoration" type="submit">
                                口コミを投稿する
                            </button>
                        </div>
                </form>
            @endif
        </div>
        <!-- ゲスト（未ログインユーザー）の場合の予約フォーム画面 -->
        @guest
        <!-- ログインユーザーの場合の予約フォーム画面 -->
        @else
            <div class="form_inner">
                <form class="form_inner-book" action="{{ route('book.store') }}" method="POST" id="bookForm">
                @csrf
                    <div class="form_inner-items">
                        <div class="flex_book">
                            <h3 class="ttl_book">予約</h3>
                        </div>
                        @if (count($errors) > 0)
                            <p class="error_msg">入力内容を確認してください</p>
                        @endif
                        <div class="book_item">
                            <input type="hidden" value="{{$shop->id}}" name="shop_id">
                            <div class="book_item-date">
                                <input class="input_decoration input_date" type="date" name="date" id="date" value="{{ old('date') }}">
                                @error('date')
                                    <p class="error_msg">{{$errors->first('date')}}</p>
                                @enderror
                            </div>
                            <div class="book_item-time">
                                <input class="input_decoration icon_del input_time" type="time" name="time" id="time" value="{{ old('time') }}">
                                @error('time')
                                    <p class="error_msg">{{$errors->first('time')}}</p>
                                @enderror
                            </div>
                            <div class="book_item-number">
                                <select class="input_decoration input_number" name="number" id="number">
                                    <option selected></option>
                                    @for ($i = 1; $i <= 10; $i++)
                                        <option value="{{ $i }}" {{ old('number') == $i ? 'selected' : '' }}>{{ $i }}人</option>
                                    @endfor
                                </select>
                                @error('number')
                                    <p class="error_msg">{{$errors->first('number')}}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="scrollable_container">
                        @foreach($bookRecords as $bookRecord)
                            <div class="confirm_table">
                                <table class="confirm_table-inner" id="bookTable">
                                    <tr class="confirm_table-row">
                                        <th class="confirm_table-header">Shop</th>
                                        <td class="confirm_table-text">{{ $shop->shop }}</td>
                                    </tr>
                                    <tr class="confirm_table-row">
                                        <th class="confirm_table-header">Date</th>
                                        <td class="confirm_table-text">{{ $bookRecord->date }}</td>
                                    </tr>
                                    <tr class="confirm_table-row">
                                        <th class="confirm_table-header">Time</th>
                                        <td class="confirm_table-text">{{ substr($bookRecord->time, 0, 5) }}</td>
                                    </tr>
                                    <tr class="confirm_table-row">
                                        <th class="confirm_table-header">Number</th>
                                        <td class="confirm_table-text">{{ $bookRecord->number }}人</td>
                                    </tr>
                                </table>
                            </div>
                        @endforeach
                    </div>
                    <div class="form_btn">
                        <button class="form_button-submit" type="submit">予約する</button>
                    </div>
                </form>
            </div>
        @endguest
    </div>
    <!-- JavaScript読み込み -->
    <script src="{{ asset('/js/ham.js') }}"></script>
@endsection