@extends('layouts.common')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/ownerThanks.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
@endsection

@section('content')
<div class="thanks_content">
    <div class="thanks_heading">
      <h1>登録しました</h1>
    </div>
    <div class="form_button">
        <button onclick="location.href='/manager/shop'" class="form_button-submit" type="submit">戻る</button>
    </div>
</div>
@endsection