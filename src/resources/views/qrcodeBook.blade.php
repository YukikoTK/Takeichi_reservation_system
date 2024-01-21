@extends('layouts.common')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/qrcodeBook.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
@endsection

@include('layouts.header')

@section('content')
    <div class="table">
        <table class="table_inner">
            <tr class="table_row">
                <th class="table_head">名前</th>
                <td class="table_detail">{{ $bookRecord->user ? $bookRecord->user->name : '' }}</td>
            </tr>
            <tr class="table_row">
                <th class="table_head">店舗名</th>
                <td class="table_detail">{{ $bookRecord->shop ? $bookRecord->shop->shop : '' }}</td>
            </tr>
            <tr class="table_row">
                <th class="table_head">予約日</th>
                <td class="table_detail">{{ $bookRecord->date }}</td>
            </tr>
            <tr class="table_row">
                <th class="table_head">時間</th>
                <td class="table_detail">{{ substr($bookRecord->time, 0, 5) }}</td>
            </tr>
            <tr class="table_row">
                <th class="table_head">人数</th>
                <td class="table_detail">{{ $bookRecord->number }}</td>
            </tr>
        </table>
    </div>
@endsection