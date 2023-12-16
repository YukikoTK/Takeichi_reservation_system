@extends('layouts.common')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/done.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
@endsection

@include('layouts.header')

@section('content')
    <div class="thanks_card">
        <p class="thanks_msg">ご予約ありがとうございます</p>
        <div class="return_btn">
            <a class="return_link" href="/mypage">戻る</a>
        </div>
    </div>
@endsection
