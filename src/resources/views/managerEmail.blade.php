@extends('layouts.common')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/managerCreate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
@endsection

@section('content')
<div class="create-form_content">
  <div class="create-form_heading">
    <h1>メール送信</h1>
  </div>
  <form class="form" action="{{ route('mail.send') }}" method="POST">
    @csrf
    <div class="form_group">
      <div class="form_group-title">
        <span class="form_label-item">宛先</span>
      </div>
      <div class="form_group-content">
        <div class="form_input-text">
          <input type="email" name="email"/>
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
        <span class="form_label-item">件名</span>
      </div>
      <div class="form_group-content">
        <div class="form_input-text">
          <input type="text" name="title"/>
        </div>
        <div class="form_error">
          @error('title')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    <div class="form_group">
      <div class="form_group-title">
        <span class="form_label-item">本文</span>
      </div>
      <div class="form_group-content">
        <div class="form_input-textarea">
          <textarea type="text" name="text"  value="" rows="10"></textarea>
        </div>
        <div class="form_error">
          @error('text')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    <div class="form_button">
      <button class="form_button-submit" type="submit">送信</button>
    </div>
  </form>
  @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
  @endif
  <div class="button">
      <button class="return_button" onclick="location.href='/manager'">戻る</button>
  </div>
</div>
@endsection