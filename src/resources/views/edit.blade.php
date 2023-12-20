@extends('layouts.common')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
@endsection

@include('layouts.header')

@section('content')
    <div class="form_inner">
        <form class="form_inner-edit" action="{{ route('book.update') }}" method="POST" id="bookForm">
            @csrf
            <div class="form_inner-items">
                <div class="edit">
                    <h3 class="ttl_edit">予約変更</h3>
                </div>
                @if (count($errors) > 0)
                    <p class="error_msg">入力内容を確認してください</p>
                @endif
                <div class="edit_table">
                    <table class="edit_table-inner" id="bookTable">
                        <tr class="edit_table-row">
                            <th class="edit_table-header">Shop</th>
                            <td class="edit_table-text">{{ $bookEdit->shop->shop}}</td>
                        </tr>
                        <tr class="edit_table-row">
                            <th class="edit_table-header">Date</th>
                            <td class="edit_table-text">
                                <input class="input_decoration input_date" type="date" name="date" id="date" value="{{ old('date', $bookEdit->date) }}">
                                @error('date')
                                    <p class="error_msg">{{ $message }}</p>
                                @enderror
                            </td>
                        </tr>
                        <tr class="edit_table-row">
                            <th class="edit_table-header">Time</th>
                            <td class="edit_table-text">
                                <input class="input_decoration icon_del input_time" type="time" name="time" id="time" value="{{ old('time', substr($bookEdit->time, 0, 5)) }}">
                                @error('time')
                                    <p class="error_msg">{{ $message }}</p>
                                @enderror
                            </td>
                        </tr>
                        <tr class="edit_table-row">
                            <th class="edit_table-header">Number</th>
                            <td class="edit_table-text">
                                <select class="input_decoration input_number" name="number" id="number" value="">
                                    <option value="" selected></option>
                                    @for ($i = 1; $i <= 10; $i++)
                                        <option value="{{ $i }}" @if (old('number', $bookEdit->number) == $i) selected @endif>{{ $i }}人</option>
                                    @endfor
                                </select>
                                @error('number')
                                    <p class="error_msg">{{ $message }}</p>
                                @enderror
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="form_btn">
                <input type="hidden" name="id" value="{{ $bookEdit->id }}">
                <button class="form_button-submit" type="submit">変更する</button>
            </div>
        </form>
    </div>
@endsection