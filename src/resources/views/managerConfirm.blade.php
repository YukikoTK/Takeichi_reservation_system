@extends('layouts.common')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/ownerConfirm.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
@endsection

@section('content')
<div class="confirm_content">
  <div class="confirm_heading">
    <h1>登録内容確認</h1>
  </div>
  <form class="form" action="{{ route('manager.store') }}" method="post">
    @csrf
    <div class="confirm-table">
      <table class="confirm-table_inner">
        <tr class="confirm-table_row">
          <th class="confirm-table_header">エリア</th>
          <td class="confirm-table_text">
            <input type="text" name="area" value="{{ $data['area'] }}" readonly/>
          </td>
        </tr>
        <tr class="confirm-table_row">
          <th class="confirm-table_header">ジャンル</th>
          <td class="confirm-table_text">
            <input type="text" name="genre" value="{{ $data['genre'] }}" readonly/>
          </td>
        </tr>
        <tr class="confirm-table_row">
          <th class="confirm-table_header">店舗名</th>
          <td class="confirm-table_text">
            <input type="text" name="shop" value="{{ $data['shop'] }}" readonly/>
          </td>
        </tr>
        <tr class="confirm-table_row">
          <th class="confirm-table_header">店舗詳細</th>
          <td class="confirm-table_text">
            <textarea type="text" name="detail" value="" rows="10" readonly>{{ $data['detail'] }}
            </textarea>
          </td>
        </tr>
        <tr class="confirm-table_row">
          <th class="confirm-table_header">イメージ</th>
          <td class="confirm-table_text">
            <textarea type="text" name="img" value="" rows="3" readonly>{{ $data['img'] }}
            </textarea>
          </td>
        </tr>
      </table>
    </div>
    <div class="form_button">
      <button class="form_button-submit" type="submit">送信</button>
    </div>
  </form>
  <div class="button">
    <button class="return_button" onclick="location.href='/manager/create'">戻る</button>
  </div>
</div>
@endsection