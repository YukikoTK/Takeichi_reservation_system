@extends('layouts.common')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/csv.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
@endsection

@section('content')
  <div class="upload">
    <p class="top_ttl">DBに追加したいCSVデータを選択してください。</p>
    @if(isset($message))
      <p class="success_msg">{{ $message }}</p>
    @endif
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul class="list_inner">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    <form action="{{ route('csv.upload') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="csv_inner">
        <input type="file" id="csvdata" name="csvdata" class="csv_input"/>
      </div>
      <div class="button">
        <button type="submit" class="csv_button">送信</button>
      </div>
    </form>
    <div class="button">
      <button class="return_button" onclick="location.href='/owner'">戻る</button>
    </div>
  </div>
@endsection