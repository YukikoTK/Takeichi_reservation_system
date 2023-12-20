<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Rese</title>
        <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
        <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    </head>
    <body>
        <header class="header_inner">
            <div class="header_items">
                <!-- ハンバーガーメニュー -->
                <div id="btn" class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <!-- ハンバーガーメニューの中身 -->
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

            <!-- 検索バー -->
            <div class="search_items">
                <div class="search_items-area">
                    <select type="text" name="area" id="area" class="search_decoration-select search_decoration-area">
                        <option value="">All area</option>
                        @foreach($areas as $key => $score)
                            <option value="{{ $score }}">{{ $score }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="search_items-genre">
                    <select type="text" name="genre" id="genre" class="search_decoration-select search_decoration-genre">
                        <option value="">All genre</option>
                        @foreach($genres as $key => $score)
                            <option value="{{ $score }}">{{ $score }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="search_items-text">
                    <img src="{{asset('img/search-icon.svg')}}" alt="検索マーク">
                    <input class="search_decoration-input" type="text" name="shop" id="shop" placeholder="Search...">
                </div>
            </div>
            <!-- JavaScript読み込み -->
            <script src="{{ asset('/js/ham.js') }}"></script>
            <script src="{{ asset('/js/search.js') }}"></script>
        </header>
        <main>
            <div class="flex_item">
                @foreach ($shops as $shop)
                    <div class="shop_card">
                        <div id="search-results"></div>
                        <div class="card_img">
                            <img src="{{$shop->img}}" alt="店舗の画像">
                        </div>
                        <div class="card_content search-target">
                            <h2 class="shop_name">{{$shop->shop}}</h2>
                            <div class="tag">
                                <p class="tag_area">#{{$shop->area->area}}</p>
                                <p class="tag_genre">#{{$shop->genre->genre}}</p>
                            </div>
                            <div class="btn_flex">
                                <a href="{{ route('detail.show', ['shop_id' => $shop->id]) }}" class="shop_btn">詳しくみる</a>

                                <!-- いいね機能 -->
                                <!-- ゲスト（未ログインユーザー）の場合のいいね機能 -->
                                @guest
                                    <a href="/login" class="heart_btn">
                                        <img src="{{ asset('img/heart-gray.svg') }}" alt="いいねボタン" class="heart_btn-gray">
                                    </a>
                                <!-- ログインユーザーの場合のいいね機能 -->
                                @else
                                    <form action="{{ in_array($shop->id, $likedShopIds) ? route('like.destroy') : route('like.store') }}" method="post">
                                        @csrf
                                        @if(in_array($shop->id, $likedShopIds))
                                        @method('DELETE')
                                        @endif
                                        <input type="hidden" name="shop_id" value="{{ $shop->id }}">

                                        <button type="submit" class="heart_btn">
                                        <img src="{{ in_array($shop->id, $likedShopIds) ? asset('img/heart-red.svg') : asset('img/heart-gray.svg') }}" alt="いいねボタン" class="{{ in_array($shop->id, $likedShopIds) ? 'heart_btn-red' : 'heart_btn-gray' }}">
                                        </button>
                                    </form>
                                @endguest
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </main>
    </body>
</html>