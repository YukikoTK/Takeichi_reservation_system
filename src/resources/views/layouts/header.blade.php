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

    <!-- JavaScript読み込み -->
    <script src="{{ asset('/js/ham.js') }}"></script>
</header>