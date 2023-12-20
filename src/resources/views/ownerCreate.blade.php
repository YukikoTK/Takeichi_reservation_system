@extends('layouts.common')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/ownerCreate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
@endsection

@section('content')
<div class="create-form_content">
  <div class="create-form_heading">
    <h1>店舗代表者登録</h1>
  </div>
  <form class="form" action="{{ route('owner.confirm') }}" method="POST">
    @csrf
    <div class="form_group">
      <div class="form_group-title">
        <span class="form_label-item">名前</span>
      </div>
      <div class="form_group-content">
        <div class="form_input-text">
          <input type="text" name="name" placeholder="テスト太郎" value="{{ old('name') }}"/>
        </div>
        <div class="form_error">
          @error('name')
            {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    <div class="form_group">
      <div class="form_group-title">
        <span class="form_label-item">メールアドレス</span>
      </div>
      <div class="form_group-content">
        <div class="form_input-text">
          <input type="email" name="email" placeholder="test@example.com" value="{{ old('email') }}"/>
        </div>
        <div class="form_error">
          @error('email')
            {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    <div class="form_group">
      <div class="form_group-title">
        <span class="form_label-item">パスワード</span>
      </div>
      <div class="form_group-content">
        <div class="form_input-text">
          <input type="password" name="password" placeholder="8文字以上で入力してください" value="{{ old('password') }}"/>
        </div>
        <div class="form_error">
          @error('password')
            {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    <div class="form_group">
      <div class="form_group-title">
        <span class="form_label-item">権限</span>
      </div>
      <div class="form_group-content">
        <div class="form_input-text">
          <input type="text" name="role" value="manager" readonly>
        </div>
        <div class="form_error">
          @error('role')
            {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    <div class="form_button">
      <button class="form_button-submit" type="submit">送信</button>
    </div>
  </form>
  <div class="button">
    <button class="return_button" onclick="location.href='/owner'">戻る</button>
  </div>
</div>
@endsection