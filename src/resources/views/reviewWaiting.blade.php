@extends('layouts.common')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/reviewWaiting.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
@endsection

@include('layouts.header')

@section('content')
    <div class="review_card">
        <p class="review_msg">ご予約・ご来店をお待ちしております。</p>
        <div class="button">
            <button class="return_button" onclick="location.href='{{ route('detail.show', ['shop_id' => $shopId])  }}'">戻る</button>
        </div>
    </div>
@endsection
