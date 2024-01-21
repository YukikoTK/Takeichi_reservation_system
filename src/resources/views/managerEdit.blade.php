@extends('layouts.common')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/managerEdit.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
@endsection

@section('content')
<div class="confirm_content">
  <div class="confirm_heading">
    <h1>登録内容変更</h1>
  </div>
  <form class="form" action="{{ route('manager.update') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ $shop['id'] }}">
    <div class="confirm-table">
      <table class="confirm-table_inner">
        <tr class="confirm-table_row">
          <th class="confirm-table_header">エリア</th>
          <td class="confirm-table_text">
            <select type="text" name="area" id="area" class="form_input-select">
              <option value=""></option>
              @foreach($areas as $key => $score)
                <option value="{{ $score }}" {{ $shop->area->area == $score ? 'selected' : '' }}>{{ $score }}</option>
              @endforeach
            </select>
            <div class="form_error">
              @error('area')
              {{ $message }}
              @enderror
            </div>
          </td>
        </tr>
        <tr class="confirm-table_row">
          <th class="confirm-table_header">ジャンル</th>
          <td class="confirm-table_text">
            <select type="text" name="genre" id="genre" class="form_input-select">
              <option value=""></option>
              @foreach($genres as $key => $score)
                <option <option value="{{ $score }}" {{ $shop->genre->genre == $score ? 'selected' : '' }}>{{ $score }}</option>
              @endforeach
            </select>
            <div class="form_error">
              @error('genre')
                {{ $message }}
              @enderror
            </div>
          </td>
        </tr>
        <tr class="confirm-table_row">
          <th class="confirm-table_header">店舗名</th>
          <td class="confirm-table_text">
            <input type="text" name="shop" value="{{ $shop->shop }}"/>
          </td>
        </tr>
        <tr class="confirm-table_row">
          <th class="confirm-table_header">店舗詳細</th>
          <td class="confirm-table_text">
            <textarea type="text" name="detail" value="" rows="10">{{ $shop->detail }}
            </textarea>
            <div class="form_error">
              @error('detail')
                {{ $message }}
              @enderror
            </div>
          </td>
        </tr>
        <tr class="confirm-table_row">
          <th class="confirm-table_header">イメージ</th>
          <td class="confirm-table_text">
            <input type="file" name="img" accept="image/jpeg">
            <div class="form_error">
              @error('img')
                {{ $message }}
              @enderror
            </div>
          </td>
        </tr>
      </table>
    </div>
    <div class="form_button">
      <button class="form_button-submit" type="submit">送信</button>
    </div>
  </form>
  <div class="button">
    <button class="return_button" onclick="location.href='/manager/shop'">戻る</button>
  </div>
</div>
@endsection