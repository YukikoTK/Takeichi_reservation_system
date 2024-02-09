@extends('layouts.common')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/ownerReview.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
@endsection

@section('content')
<div class="main_content">
    <h1 class="title">
        口コミ投稿ユーザー一覧
    </h1>
    <table class="table_inner">
        <tr class="table_inner-row">
            <th class="table_inner-head userId">ユーザーID</th>
            <th class="table_inner-head userName">名前</th>
            <th class="table_inner-head list">投稿一覧</th>
        </tr>
        @foreach($usersWithReviews as $usersWithReview)
            <tr class="table_inner-row">
                <td class="table_inner-data">{{ $usersWithReview->id }}</td>
                <td class="table_inner-data">{{ $usersWithReview->name }}</td>
                <td class="table_inner-data">
                    <form action="{{ route('owner.reviewShow', ['user_id' => $usersWithReview->id]) }}" method="GET">
                        @csrf
                        <button class="delete_button show_button" type="submit">一覧へ</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $usersWithReviews->links() }}
    <div class="button">
        <button class="return_button" onclick="location.href='/owner'">戻る</button>
    </div>
</div>
@endsection