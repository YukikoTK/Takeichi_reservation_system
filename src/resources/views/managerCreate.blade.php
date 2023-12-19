@extends('layouts.common')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/managerCreate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
@endsection

@section('content')
<div class="create-form_content">
      <div class="create-form_heading">
        <h1>店舗新規登録</h1>
      </div>
      <form class="form" action="{{ route('manager.confirm') }}" method="POST">
        @csrf
        <div class="form_group">
          <div class="form_group-title">
            <span class="form_label-item">エリア</span>
          </div>
          <div class="form_group-content">
            <select type="text" name="area" id="area" class="form_input-select">
              <option value=""></option>
              @foreach($areas as $key => $score)
              <option value="{{ $score }}" {{ old('area') == $score ? 'selected' : '' }}>{{ $score }}</option>
              @endforeach
              </select>
            <div class="form_error">
              @error('area')
              {{ $message }}
              @enderror
            </div>
          </div>
        </div>
        <div class="form_group">
          <div class="form_group-title">
            <span class="form_label-item">ジャンル</span>
          </div>
          <div class="form_group-content">
            <select type="text" name="genre" id="genre" class="form_input-select">
              <option value=""></option>
              @foreach($genres as $key => $score)
              <option <option value="{{ $score }}" {{ old('genre') == $score ? 'selected' : '' }}>{{ $score }}</option>
              @endforeach
              </select>
            <div class="form_error">
              @error('genre')
              {{ $message }}
              @enderror
            </div>
          </div>
        </div>
        <div class="form_group">
          <div class="form_group-title">
            <span class="form_label-item">店舗名</span>
          </div>
          <div class="form_group-content">
            <div class="form_input-text">
              <input type="text" name="shop" placeholder="ショップ太郎" value="{{ old('shop') }}"/>
            </div>
            <div class="form_error">
              @error('shop')
              {{ $message }}
              @enderror
            </div>
          </div>
        </div>
        <div class="form_group">
          <div class="form_group-title">
            <span class="form_label-item">店舗詳細</span>
          </div>
          <div class="form_group-content">
            <div class="form_input-textarea">
              <textarea type="text" name="detail" placeholder="イタリアンです" value="" rows="10">{{ old('detail') }}</textarea>
            </div>
            <div class="form_error">
              @error('detail')
              {{ $message }}
              @enderror
            </div>
          </div>
        </div>
        <div class="form_group">
          <div class="form_group-title">
            <span class="form_label-item">イメージ</span>
          </div>
          <div class="form_group-content">
            <div class="form_input-textarea">
              <textarea type="text" name="img" placeholder="画像URL" value="" rows="3">{{ old('img') }}</textarea>
            </div>
            <div class="form_error">
              @error('img')
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
          <button class="return_button" onclick="location.href='/manager/shop'">戻る</button>
        </div>
    </div>
@endsection