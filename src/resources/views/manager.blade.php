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
                    <button onclick="location.href='/manager/shop'" class="menu_btn-items">店舗管理画面</button>
                </li>
                <li class="menu_inner-items">
                    <button onclick="location.href='/manager/mail'" class="menu_btn-items">メール送信</button>
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