@extends('layouts.common')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
@endsection

@include('layouts.header')

@section('content')
    <div class="form_inner">
        {!! QrCode::size(300)->generate(route('qrcode.show', 
            [
                'id' => $bookRecord->id,
                'name' => $bookRecord->user->name,
                'shop' => $bookRecord->shop->shop,
                'date' => $bookRecord->date,
                'time' => $bookRecord->time,
                'number' => $bookRecord->number,
            ]
        )) !!}
    </div>
@endsection