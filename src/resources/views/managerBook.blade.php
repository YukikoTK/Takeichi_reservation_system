@extends('layouts.common')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/managerBook.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
@endsection

@section('content')
<div class="main_content">
    <h1 class="title">
        店舗一覧
    </h1>
    <div class="btn_create">
        <button type="button" onclick="location.href='/manager/create'" class="btn_create-new">
            店舗新規登録
        </button>
    </div>
    <table class="table_inner">
        <tr>
            <th>ID</th>
            <th>店舗名</th>
            <th>登録変更</th>
            <th>予約確認</th>
        </tr>
        @foreach($shops as $shop)
            <tr>
                <td>{{ $shop->id }}</td>
                <td>{{ $shop->shop }}</td>
                <td>
                    <form action="{{ route('manager.edit') }}" action="GET">
                        @csrf
                        <input type="hidden" name="id" value="{{ $shop->id }}">
                        <button type="submit">変更</button>
                    </form>
                </td>
                <td>
                    <button type="button" onclick="location.href='{{ route('manager.show', ['shop_id' => $shop->id]) }}' ">確認
                    </button>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $shops->links() }}
    <div class="button">
        <button class="return_button" onclick="location.href='/manager'">戻る</button>
    </div>
</div>
@endsection