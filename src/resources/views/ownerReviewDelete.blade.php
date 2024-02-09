@extends('layouts.common')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/ownerReviewDelete.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
@endsection

@section('content')
<div class="main_content">
    <h1 class="title">
        口コミ投稿一覧
    </h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table_inner">
        <tr class="table_inner-row">
            <th class="table_inner-head shop">店舗</th>
            <th class="table_inner-head star">評価</th>
            <th class="table_inner-head comment">コメント</th>
            <th class="table_inner-head review_img">画像</th>
            <th class="table_inner-head delete">削除</th>
        </tr>
        @foreach($reviewRecords as $reviewRecord)
            <tr class="table_inner-row">
                <td class="table_inner-data">{{ $reviewRecord->shop->shop }}</td>
                <td class="table_inner-data">{{ $reviewRecord->star }}</td>
                <td class="table_inner-data comment_left">{{ $reviewRecord->comment }}</td>
                <td class="table_inner-data">
                    @if ($reviewRecord->img_review)
                        <img class="review_img-img" src="{{ asset('storage/review_image/' . basename($reviewRecord->img_review)) }}" alt="投稿画像">
                    @endif
                </td>
                <td class="table_inner-data">
                    <form action="{{ route('owner.reviewDestroy') }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input type="hidden" name="id" value="{{ $reviewRecord->id }}">
                        <button class="delete_button" type="submit">削除</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $reviewRecords->links() }}
    <div class="button">
        <button class="return_button" onclick="location.href='{{ route('owner.review') }}'">戻る</button>
    </div>
</div>
@endsection