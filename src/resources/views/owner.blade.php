@extends('layouts.common')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
@endsection

@section('content')
<div class="menu_ttl">
    <h1>Rese</h1>
</div>
<div class="menu">
    <div class="menu_inner">
        <nav id="menu_inner-nav">
            <ul>
                <li class="menu_inner-items">
                    <button onclick="location.href='/owner/create'" class="menu_btn-items">店舗代表者登録</button>
                </li>
                <li class="menu_inner-items">
                    <button onclick="location.href='/csv'" class="menu_btn-items">csvインポート</button>
                </li>
                <li class="menu_inner-items">
                    <form action="{{ route('owner.review') }}">
                        @csrf
                            <button class="menu_btn-items" type="submit">口コミ削除</button>
                    </form>
                </li>
                <li class="menu_inner-items">
                    <form action="{{ route('logout')}}"  method="POST">
                    @csrf
                        <button class="menu_btn-items" type="submit">Logout</button>
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</div>
@endsection