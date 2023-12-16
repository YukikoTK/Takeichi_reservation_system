@extends('layouts.common')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
@endsection

@include('layouts.header')

@section('content')
    <div class="card">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="card_inner">
                <h2 class="ttl">Registration</h2>
                @if ($errors->any())
                <div class="error error_ttl">
                    {{ __('Whoops! Something went wrong.') }}
                </div>
                <ul class="error error_msg">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
                <div class="card_items-center">
                    <div class="card_items">
                        <div class="item_margin">
                            <img class="user_icon" src="{{ asset('img/user-icon.svg') }}" alt="ユーザーの画像" width="24" height="24">
                            <input class="input_decoration" id="name" type="text" name="name" placeholder="Username" value="{{ old('name') }}" required autofocus>
                        </div>
                        <div class="item_margin">
                            <img class="email_icon" src="{{ asset('img/email-icon.svg') }}" alt="メールの画像" width="24" height="24">
                            <input class="input_decoration" id="email" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                        </div>
                        <div class="item_margin">
                            <img src="{{ asset('img/key-icon.svg') }}" alt="鍵の画像" width="24" height=""24>
                            <input class="input_decoration" type="password" name="password" id="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="btn_decoration">
                        <button class="btn" type="submit">登録</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection