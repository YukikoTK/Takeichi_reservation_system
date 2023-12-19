@extends('layouts.common')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/ownerConfirm.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
@endsection

@section('content')
<div class="confirm_content">
      <div class="confirm_heading">
        <h2>登録内容確認</h2>
      </div>
      <form class="form" action="{{ route('owner.store') }}" method="post">
        @csrf
        <div class="confirm-table">
          <table class="confirm-table_inner">
            <tr class="confirm-table_row">
              <th class="confirm-table_header">名前</th>
              <td class="confirm-table_text">
                <input type="text" name="name" value="{{ $data['name'] }}" readonly/>
              </td>
            </tr>
            <tr class="confirm-table_row">
              <th class="confirm-table_header">メールアドレス</th>
              <td class="confirm-table_text">
                <input type="email" name="email" value="{{ $data['email'] }}" readonly/>
              </td>
            </tr>
            <tr class="confirm-table_row">
              <th class="confirm-table_header">パスワード</th>
              <td class="confirm-table_text">
                <input type="password" name="password" value="{{ $data['password'] }}" readonly/>
              </td>
            </tr>
            <tr class="confirm-table_row">
              <th class="confirm-table_header">権限</th>
              <td class="confirm-table_text">
                <input type="text" name="role" value="{{ $data['role'] }}" readonly/>
              </td>
            </tr>
          </table>
        </div>
        <div class="form_button">
          <button class="form_button-submit" type="submit">送信</button>
        </div>
      </form>
      <div class="button">
        <button class="return_button" onclick="location.href='/owner/create'">戻る</button>
      </div>
    </div>
@endsection