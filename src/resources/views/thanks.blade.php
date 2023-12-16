@extends('layouts.common')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
@endsection

@include('layouts.header')

@section('content')
    <div class="thanks_card">
        <div class="thanks_ttl">
            <p class="thanks_msg">会員登録ありがとうございます</p>
        </div>
        <p class="thanks_email">
            入力いただいたメールアドレス宛に確認メールを送信しました。<br>メールをご確認いただき、メールに記載されたURLをクリックして登録を完了してください。<br>メールが届いていない場合は、メールを再送できます。
        </p>

        @if (session('status') == 'verification-link-sent')
            <div class="send_msg">
                確認メールを送信しました。
            </div>
        @endif

        <div class="btn">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <div class="resend_btn">
                    <button class="resend_btn-decoration" type="submit">
                        確認メールを再送する
                    </button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <div class="logout_btn">
                    <button class="logout_btn-decoration" type="submit">
                        ログアウトする
                    </button>
            </form>
        </div>
    </div>
@endsection