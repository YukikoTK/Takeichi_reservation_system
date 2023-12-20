@extends('layouts.common')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/managerShow.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
@endsection

@section('content')
<div class="main_content">
    <h1 class="title">
        {{ $shop->shop }}
    </h1>
    <table class="table_inner">
        <tr>
            <th>名前</th>
            <th>予約日</th>
            <th>予約時間</th>
            <th>予約人数</th>
        </tr>
        @foreach($bookRecords as $bookRecord)
            <tr>
                <td>{{ $bookRecord->user->name }}</td>
                <td>{{ $bookRecord->date }}</td>
                <td>{{ $bookRecord->time }}</td>
                <td>{{ $bookRecord->number }}</td>
            </tr>
        @endforeach
    </table>
    <div class="button">
        <button class="return_button" onclick="location.href='/manager/shop'">戻る</button>
    </div>
</div>
@endsection