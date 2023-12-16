<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\BookRequest;

class BookController extends Controller
{
  public function show()
  {
    $userRecord = Auth::user();
    $userId = Auth::id();
    $bookRecords = Book::with('shop')->where('user_id', $userId)->get();
    $likedRecords = Like::with('shop')->where('user_id', $userId)->get();

    return view('mypage', compact('userRecord', 'bookRecords', 'likedRecords'));
  }

  public function store(BookRequest $request)
  {
    $userId = Auth::id();
    $bookData = $request->all();

    // 文字列から数値のみを取得（数字以外の文字を削除）
    if (!is_numeric($bookData['number'])) {
      $bookData['number'] = preg_replace('/[^0-9]/', '', $bookData['number']);
    }

    Book::create([
      'user_id' => $userId,
      'shop_id' => $bookData['shop_id'],
      'date' => $bookData['date'],
      'time' => $bookData['time'],
      'number' => $bookData['number']
    ]);

    return view('done');
  }

  public function destroy(Request $request) {
    Book::find($request->id)->delete();

    return back();
  }

  public function edit(Request $request) {
    $bookEdit = Book::find($request->id);

    return view('edit', compact('bookEdit'));
  }

  public function update(BookRequest $request) {
    $userId = Auth::id();
    $form = $request->only(['date', 'time', 'number', 'id']);

    Book::where('user_id', $userId)
        ->where('id', $form['id'])
        ->update([
            'user_id' => $userId,
            'date' => $form['date'],
            'time' => $form['time'],
            'number' => $form['number']
        ]);

    return view('confirm');
  }
}
